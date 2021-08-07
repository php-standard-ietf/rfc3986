<?php

declare(strict_types=1);

namespace IETFTest\Rfc3986\Components\Authority\IPV4Address;

use IETF\Rfc3986\Components\Authority\IPV4Address\DecOctet;
use PHPUnit\Framework\TestCase;

use function preg_match;

class DecOctetTest extends TestCase
{
    public function examples(): array
    {
        return [
            ['0', true],
            ['9', true],
            ['10', true],
            ['99', true],
            ['200', true],
            ['249', true],
            ['250', true],
            ['255', true],
            ['00', false],
            ['000', false],
            ['09', false],
            ['009', false],
            ['010', false],
            ['099', false],
            ['0200', false],
            ['256', false],
            ['2550', false],
            ['a', false],
            ['A', false],
            ['-1', false],
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
        $actual = preg_match('/^' . DecOctet::REGEX . '$/', $value) === 1;

        $this->assertEquals($expected, $actual, $value);
    }
}
