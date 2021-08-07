<?php

declare(strict_types=1);

namespace IETFTest\Rfc3986\Characters;

use IETF\Rfc3986\Characters\PercentEncoding;
use PHPUnit\Framework\TestCase;

use function preg_match;

class PercentEncodingTest extends TestCase
{
    public function examples(): array
    {
        return [
            ["%00", true],
            ["%99", true],
            ["%AA", true],
            ["%FF", true],
            ["%GG", false],
            ["00", false],
            ["99", false],
            ["AA", false],
            ["FF", false],
            ["%", false],
            ["%aa", false],
            ["%ff", false],
        ];
    }

    /**
     * @test
     * @dataProvider examples
     */
    public function regexWillReturnExpectedResult(
        string $value,
        bool $expected
    ): void {
        $actual = preg_match('/' . PercentEncoding::REGEX . '/', $value) === 1;

        $this->assertEquals($expected, $actual, $value);
    }
}
