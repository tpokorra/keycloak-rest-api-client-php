<?php

declare(strict_types=1);

namespace Fschmtt\Keycloak\Test\Unit\Serializer;

use Fschmtt\Keycloak\Serializer\IntegerSerializer;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Fschmtt\Keycloak\Serializer\IntegerSerializer
 */
class IntegerSerializerTest extends TestCase
{
    public function testSerializes(): void
    {
        static::assertSame(
            'int',
            (new IntegerSerializer())->serializes()
        );
    }

    /**
     * @dataProvider provideData
     */
    public function testSerialize(mixed $value, int $expected): void
    {
        $serializer = new IntegerSerializer();

        static::assertSame(
            $expected,
            $serializer->serialize('int', $value),
        );
    }

    /**
     * @return array<mixed>
     */
    public function provideData(): array
    {
        return [
            ['', 0],
            [' ', 0],
            ['0', 0],
            ['1', 1],
            ['1337', 1337],
            [' 1337  abc', 1337],
            [true, 1],
            [false, 0],
            [null, 0],
        ];
    }
}
