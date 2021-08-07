<?php

declare(strict_types=1);

namespace IETFTest\Rfc3986\Components\Authority\Host\IPV6Address;

use IETF\Rfc3986\Components\Authority\Host\IPV6Address\Hs16;
use PHPUnit\Framework\TestCase;

use function preg_match;

class Hs16Test extends TestCase
{
    public function examples(): array
    {
        return [
            ['0', true],
            ['00', true],
            ['000', true],
            ['0000', true],
            ['F', true],
            ['FF', true],
            ['FFF', true],
            ['FFFF', true],
            ['G', false],
            ['GG', false],
            ['GGG', false],
            ['GGGG', false],
            ['00000', false],
            ['f', false],
            ['ff', false],
            ['fff', false],
            ['ffff', false],
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
        $actual = preg_match('/^' . Hs16::REGEX . '$/', $value) === 1;

        $this->assertEquals($expected, $actual, $value);
    }
}
