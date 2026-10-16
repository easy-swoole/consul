<?php
namespace EasySwoole\Consul\Tests;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

final class TypeDeclarationTest extends TestCase
{
    public function testEveryPropertyAndMethodReturnIsTyped(): void
    {
        foreach ($this->sourceTypes() as $type) {
            $reflection = new ReflectionClass($type);

            foreach ($reflection->getProperties() as $property) {
                if ($property->getDeclaringClass()->getName() === $type) {
                    self::assertNotNull(
                        $property->getType(),
                        sprintf('%s::$%s must declare a type', $type, $property->getName())
                    );
                }
            }

            foreach ($reflection->getMethods() as $method) {
                if ($method->getDeclaringClass()->getName() !== $type || $method->isConstructor() || $method->isDestructor()) {
                    continue;
                }

                self::assertNotNull(
                    $method->getReturnType(),
                    sprintf('%s::%s() must declare a return type', $type, $method->getName())
                );
            }
        }
    }

    /** @return iterable<class-string> */
    private function sourceTypes(): iterable
    {
        $source = dirname(__DIR__) . '/src';
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source));

        foreach ($files as $file) {
            if (!$file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            $relative = substr($file->getPathname(), strlen($source) + 1, -4);
            $type = 'EasySwoole\\Consul\\' . str_replace(DIRECTORY_SEPARATOR, '\\', $relative);

            if (class_exists($type) || interface_exists($type)) {
                yield $type;
            }
        }
    }
}
