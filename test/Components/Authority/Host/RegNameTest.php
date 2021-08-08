<?php

declare(strict_types=1);

    namespace IETFTest\Rfc3986\Components\Authority\Host\IPV4Address;

use IETF\Rfc3986\Components\Authority\Host\RegName;
use IETFTest\Rfc3986\Characters\PercentEncodingTest;
use IETFTest\Rfc3986\Characters\SubDelimsTest;
use IETFTest\Rfc3986\Characters\UnreservedTest;
use PHPUnit\Framework\TestCase;

use function array_map;
use function preg_match;

class RegNameTest extends TestCase
{
    public static function validValues(): array
    {
        $values = [];
        foreach (UnreservedTest::validValues() as $unreserved) {
            foreach (PercentEncodingTest::validValues() as $percentEncoded) {
                foreach (SubDelimsTest::validValues() as $subDelims) {
                    $values[] = $unreserved.$percentEncoded.$subDelims;
                    $values[] = $unreserved.$subDelims.$percentEncoded;
                    $values[] = $percentEncoded.$subDelims.$unreserved;
                    $values[] = $percentEncoded.$unreserved.$subDelims;
                    $values[] = $subDelims.$unreserved.$percentEncoded;
                    $values[] = $subDelims.$percentEncoded.$unreserved;
                }
            }
        }

        foreach (UnreservedTest::validValues() as $unreserved) {
            foreach (SubDelimsTest::validValues() as $subDelims) {
                $values[] = $unreserved.$subDelims;
                $values[] = $subDelims.$unreserved;
            }
        }

        foreach (UnreservedTest::validValues() as $unreserved) {
            foreach (PercentEncodingTest::validValues() as $percentEncoded) {
                $values[] = $unreserved.$percentEncoded;
                $values[] = $percentEncoded.$unreserved;
            }
        }

        foreach (PercentEncodingTest::validValues() as $percentEncoded) {
            foreach (SubDelimsTest::validValues() as $subDelims) {
                $values[] = $percentEncoded.$subDelims;
                $values[] = $subDelims.$percentEncoded;
            }
        }

        return $values
            + UnreservedTest::validValues()
            + PercentEncodingTest::validValues()
            + SubDelimsTest::validValues();
    }

    public static function invalidValues(): array
    {
        return [
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
        $actual = preg_match('/'.RegName::REGEX.'/', $value) === 1;

        $this->assertEquals($expected, $actual, $value);
    }
}
