<?php

declare(strict_types=1);

namespace IETFTest\Rfc3986\Characters;

use IETF\Rfc3986\Characters\GenDelims;
use PHPUnit\Framework\TestCase;

use function preg_match;

class GenDelimsTest extends TestCase
{
    public function examples(): array
    {
        return [
            [":", true],
            ["/", true],
            ["?", true],
            ["#", true],
            ["[", true],
            ["]", true],
            ["@", true],
            ["!", false],
            ["$", false],
            ["&", false],
            ["(", false],
            [")", false],
            ["!", false],
            ["*", false],
            [",", false],
            [";", false],
            ["=", false],
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
        $actual = preg_match('/' . GenDelims::REGEX . '/', $value) === 1;

        $this->assertEquals($expected, $actual, $value);
    }
}
