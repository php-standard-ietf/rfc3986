<?php

declare(strict_types=1);

namespace IETFTest\Rfc3986\Components\Authority\Host\IPV4Address;

use IETF\Rfc3986\Components\Authority\Host\IPV4Address;
use PHPUnit\Framework\TestCase;

use function preg_match;

class IPV4AddressTest extends TestCase
{
    public function examples(): array
    {
        return [
            'new lines should not accept 1' => ["00000001.00000010.00000011.00000100\n", false],
            'new lines should not accept 2' => ["001.002.003.004\n", false],
            'new lines should not accept 3' => ["a0.b0.c0.d0\n", false],
            'all-numeric'                   => ['111111111111', false],
            'first-quartet'                 => ['111.111111111', false],
            'first-octet'                   => ['111111.111111', false],
            'last-quartet'                  => ['111111111.111', false],
            'first-second-quartet'          => ['111.111.111111', false],
            'first-fourth-quartet'          => ['111.111111.111', false],
            'third-fourth-quartet'          => ['111111.111.111', false],
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
        $actual = preg_match('/' . IPV4Address::REGEX . '/', $value) === 1;

        $this->assertEquals($expected, $actual, $value);
    }
}
