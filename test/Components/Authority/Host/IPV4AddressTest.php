<?php

declare(strict_types=1);

namespace IETFTest\Rfc3986\Components\Authority\Host\IPV4Address;

use IETF\Rfc3986\Components\Authority\Host\IPV4Address;
use PHPUnit\Framework\TestCase;

use function array_map;
use function preg_match;

class IPV4AddressTest extends TestCase
{
    public static function validValues(): array
    {
        return [
            '0.0.0.0',
            '255.255.255.255',
            '192.168.0.1',
            '172.0.0.1',
            '8.8.8.8',
        ];
    }

    public static function invalidValues(): array
    {
        return [
            "00000001.00000010.00000011.00000100\n",
            "001.002.003.004\n",
            "a0.b0.c0.d0\n",
            '111111111111',
            '111.111111111',
            '111111.111111',
            '111111111.111',
            '111.111.111111',
            '111.111111.111',
            '111111.111.111',
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

        return $validValues + $invalidValues;
    }

    /**
     * @test
     * @dataProvider examples
     */
    public function regexWillReturnExpectedResult(
        string $value,
        bool $expected
    ): void {
        $actual = preg_match('/' . IPV4Address::REGEX . '/', $value) === 1;

        $this->assertEquals($expected, $actual, $value);
    }
}
