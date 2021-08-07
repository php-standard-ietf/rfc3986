<?php

declare(strict_types=1);

namespace IETFTest\Rfc3986\Components\Authority\Host\IPV6Address;

use IETF\Rfc3986\Components\Authority\Host\IPV6Address\Ls32;
use IETFTest\Rfc3986\Components\Authority\Host\IPV4Address\IPV4AddressTest;
use PHPUnit\Framework\TestCase;

use function preg_match;

class Ls32Test extends TestCase
{
    public static function validValues(): array
    {
        $values = [];
        foreach (Hs16Test::validValues() as $value) {
            foreach (Hs16Test::validValues() as $value2) {
                $values[] = $value.':'.$value2;
            }
        }

        return $values
            + Hs16Test::validValues()
            + IPV4AddressTest::validValues();
    }

    public static function invalidValues(): array
    {
        $values = [];
        foreach (Hs16Test::validValues() as $value) {
            foreach (Hs16Test::invalidValues() as $value2) {
                $values[] = $value.':'.$value2;
            }
        }

        foreach (Hs16Test::invalidValues() as $value) {
            foreach (Hs16Test::validValues() as $value2) {
                $values[] = $value.':'.$value2;
            }
        }

        return $values + IPV4AddressTest::invalidValues();
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
        $actual = preg_match('/^'.Ls32::REGEX.'$/', $value) === 1;

        $this->assertEquals($expected, $actual, $value);
    }
}
