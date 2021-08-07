<?php

declare(strict_types=1);

namespace IETFTest\Rfc3986\Characters;

use IETF\Rfc3986\Characters\Reserved;
use IETF\Rfc3986\Characters\SubDelims;
use PHPUnit\Framework\TestCase;

use function preg_match;

class SubDelimsTest extends TestCase
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
            ["!", true],
            ["$", true],
            ["&", true],
            ["'", true],
            ["(", true],
            [")", true],
            ["*", true],
            ["+", true],
            [",", true],
            [";", true],
            ["=", true],
            ["a", false],
            ["0", false],
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
        $actual = preg_match('/' . Reserved::REGEX . '/', $value) === 1;

        $this->assertEquals($expected, $actual, $value);
    }
}
