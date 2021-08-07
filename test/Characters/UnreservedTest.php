<?php

declare(strict_types=1);

namespace IETFTest\Rfc3986\Characters;

use IETF\Rfc3986\Characters\SubDelims;
use IETF\Rfc3986\Characters\Unreserved;
use PHPUnit\Framework\TestCase;

use function preg_match;

class UnreservedTest extends TestCase
{
    public function examples(): array
    {
        return [
            ["a", true],
            ["A", true],
            ["z", true],
            ["Z", true],
            ["0", true],
            ["1", true],
            ["-", true],
            [".", true],
            ["_", true],
            ["~", true],
            [":", false],
            ["/", false],
            ["?", false],
            ["#", false],
            ["[", false],
            ["]", false],
            ["@", false],
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
        $actual = preg_match('/' . Unreserved::REGEX . '/', $value) === 1;

        $this->assertEquals($expected, $actual, $value);
    }
}
