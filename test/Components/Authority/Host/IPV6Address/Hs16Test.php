<?php

declare(strict_types=1);

namespace IETFTest\Rfc3986\Components\Authority\Host\IPV6Address;

use IETF\Rfc3986\Components\Authority\Host\IPV6Address\Hs16;
use PHPUnit\Framework\TestCase;

use function array_map;
use function preg_match;

class Hs16Test extends TestCase
{
    public static function validValues(): array
    {
        return [
            '0',
            '00',
            '000',
            '0000',
            '0F',
            '00FF',
            'F',
            'FF',
            'FFF',
            'FFFF',
        ];
    }

    public static function invalidValues(): array
    {
        return [
            '00000',
            'G',
            'G',
            'GGG',
            'GGGG',
            'f',
            'ff',
            'fff',
            'ffff',
        ];
    }

    public function examples(): array
    {
        $validValues = array_map(function ($value) {
            return [$value, true];
        }, self::validValues());

        $invalidValues = array_map(function ($value) {
            return [$value, false];
        }, self::invalidValues());

        return array_merge(
            $validValues,
            $invalidValues
        );
    }

    /**
     * @test
     * @dataProvider examples
     */
    public function regexWillReturnExpectedResult(
        string $value,
        bool $expected
    ): void {
        $actual = preg_match('/^' . Hs16::REGEX . '$/', $value) === 1;

        $this->assertEquals($expected, $actual, $value);
    }
}
