<?php

declare(strict_types=1);

namespace IETFTest\Rfc3986\Characters;

use IETF\Rfc3986\Characters\Reserved;
use PHPUnit\Framework\TestCase;

use function array_map;
use function preg_match;

class SubDelimsTest extends TestCase
{
    public static function validValues(): array
    {
        return [
            ':',
            '/',
            '?',
            '#',
            '[',
            ']',
            '@',
            '!',
            '$',
            '&',
            "'",
            '(',
            ')',
            '*',
            '+',
            ',',
            ';',
            '=',
        ];
    }

    public static function invalidValues(): array
    {
        return [
            'a',
            '0',
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
        $actual = preg_match('/' . Reserved::REGEX . '/', $value) === 1;

        $this->assertEquals($expected, $actual, $value);
    }
}
