<?php
declare(strict_types=1);

// 这个脚本由 PHP 内置服务器加载，模拟测试所需的 Consul HTTP API。
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($requestUri, PHP_URL_PATH) ?: '/';
$body = (string) file_get_contents('php://input');
$headers = function_exists('getallheaders') ? getallheaders() : [];
$stateFile = getenv('MOCK_CONSUL_STATE_FILE');

if ($stateFile === false || $stateFile === '') {
    http_response_code(500);
    echo 'Mock state file is not configured.';
    return;
}

/** @return array{kv: array<string, string>, services: array<string, mixed>, sessions: array<string, mixed>, snapshot: string, lastRequest: array<string, mixed>} */
function readState(string $stateFile): array
{
    $contents = @file_get_contents($stateFile);
    if ($contents === false || $contents === '') {
        return ['kv' => [], 'services' => [], 'sessions' => [], 'snapshot' => '', 'lastRequest' => []];
    }

    return json_decode($contents, true, 512, JSON_THROW_ON_ERROR);
}

/** @param array<string, mixed> $state */
function writeState(string $stateFile, array $state): void
{
    file_put_contents($stateFile, json_encode($state, JSON_THROW_ON_ERROR), LOCK_EX);
}

function respondJson(mixed $payload, int $status = 200): void
{
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($payload, JSON_THROW_ON_ERROR);
}

if ($path === '/v1/mock/echo') {
    respondJson(['method' => $method, 'uri' => $requestUri, 'body' => $body, 'headers' => $headers]);
    return;
}

if ($path === '/v1/mock/error') {
    header('X-Consul-Reason: mock permission denied');
    respondJson(['error' => 'forbidden'], 403);
    return;
}

if ($path === '/v1/mock/last-request') {
    respondJson(readState($stateFile)['lastRequest']);
    return;
}

if (preg_match('#^/v1/kv/(.+)$#', $path, $matches) === 1) {
    $key = rawurldecode($matches[1]);
    $state = readState($stateFile);

    if ($method === 'PUT') {
        $state['kv'][$key] = base64_encode($body);
        $state['lastRequest'] = [
            'method' => $method,
            'uri' => $requestUri,
            'body' => $body,
            'headers' => $headers,
        ];
        writeState($stateFile, $state);
        respondJson(true);
        return;
    }
    if ($method === 'GET' && isset($state['kv'][$key])) {
        respondJson([[
            'Key' => $key,
            'Value' => $state['kv'][$key],
            'Flags' => 0,
            'CreateIndex' => 1,
            'ModifyIndex' => 1,
        ]]);
        return;
    }
    if ($method === 'DELETE') {
        unset($state['kv'][$key]);
        writeState($stateFile, $state);
        respondJson(true);
        return;
    }

    header('X-Consul-Reason: key not found');
    respondJson(['error' => 'key not found'], 404);
    return;
}

if ($path === '/v1/agent/service/register' && $method === 'PUT') {
    $service = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
    $serviceId = $service['ID'] ?? $service['Name'];
    $state = readState($stateFile);
    $state['services'][$serviceId] = $service;
    writeState($stateFile, $state);
    http_response_code(200);
    return;
}

if ($path === '/v1/agent/services' && $method === 'GET') {
    respondJson(readState($stateFile)['services']);
    return;
}

if ($path === '/v1/session/create' && $method === 'PUT') {
    $session = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
    $state = readState($stateFile);
    $id = 'mock-session-' . (count($state['sessions']) + 1);
    $state['sessions'][$id] = ['ID' => $id] + $session;
    writeState($stateFile, $state);
    respondJson(['ID' => $id]);
    return;
}

if (preg_match('#^/v1/session/info/([^/]+)$#', $path, $matches) === 1 && $method === 'GET') {
    $session = readState($stateFile)['sessions'][rawurldecode($matches[1])] ?? null;
    respondJson($session === null ? [] : [$session]);
    return;
}

if ($path === '/v1/snapshot') {
    $state = readState($stateFile);
    if ($method === 'PUT') {
        $state['snapshot'] = base64_encode($body);
        writeState($stateFile, $state);
        respondJson(true);
        return;
    }
    if ($method === 'GET') {
        header('Content-Type: application/octet-stream');
        echo base64_decode($state['snapshot'], true);
        return;
    }
}

if ($method === 'GET' && $path === '/v1/status/leader') {
    respondJson('127.0.0.1:8300');
    return;
}

header('X-Consul-Reason: mock route not found');
respondJson(['error' => 'not found'], 404);
