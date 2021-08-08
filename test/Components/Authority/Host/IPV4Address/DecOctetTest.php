<?php

declare(strict_types=1);

namespace IETFTest\Rfc3986\Components\Authority\Host\IPV4Address;

use IETF\Rfc3986\Components\Authority\Host\IPV4Address\DecOctet;
use PHPUnit\Framework\TestCase;

use function array_map;
use function preg_match;

class DecOctetTest extends TestCase
{
    public static function validValues(): array
    {
        return [
            '0',
            '9',
            '10',
            '99',
            '200',
            '249',
            '250',
            '255',
        ];
    }

    public static function invalidValues(): array
    {
        return [
            '00',
            '000',
            '09',
            '009',
            '010',
            '099',
            '0200',
            '256',
            '2550',
            'a',
            'A',
            '-1',
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
        $actual = preg_match('/^' . DecOctet::REGEX . '$/', $value) === 1;

        $this->assertEquals($expected, $actual, $value);
    }
}
