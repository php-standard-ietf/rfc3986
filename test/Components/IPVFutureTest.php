<?php

declare(strict_types=1);

namespace IETFTest\Rfc3986\Components;

use IETF\Rfc3986\Components\Authority\Host\IPVFuture;
use PHPUnit\Framework\TestCase;

use function array_map;
use function preg_match;

class IPVFutureTest extends TestCase
{
    public static function validValues(): array
    {
        return [
            "v1.09azAZ-._~!$&'()*+,;=:",
            "v1.09azAZ-._~!$&'()*+,;=",
            "v1.09azAZ-._~!$&'()*+,;",
            "v1.09azAZ-._~!$&'()*+,",
            "v1.09azAZ-._~!$&'()*+",
            "v1.09azAZ-._~!$&'()*",
            "v1.09azAZ-._~!$&'()",
            "v1.09azAZ-._~!$&'(",
            "v1.09azAZ-._~!$&'",
            'v1.09azAZ-._~!$&',
            'v1.09azAZ-._~!$',
            'v1.09azAZ-._~!',
            'v1.09azAZ-._~',
            'v1.09azAZ-._',
            'v1.09azAZ-.',
            'v1.09azAZ-',
            'v1.09azAZ',
            'v1.09azA',
            'v1.09az',
            'v1.09a',
            'v1.09',
            'v1.0',
        ];
    }

    public static function invalidValues(): array
    {
        return [
            'v1.',
            'v1',
            'v',
            '',
            'vFF.Z',
            'vFG./',
            'v1./',
            'v1.?',
            'v1.#',
            'v1.[',
            'v1.]',
            'v1.@',
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
        $actual = preg_match('/' . IPVFuture::REGEX . '/', $value) === 1;

        $this->assertEquals($expected, $actual, $value);
    }
}
