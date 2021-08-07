<?php

declare(strict_types=1);

namespace IETF\Rfc3986\Components\Authority\IPV4Address;

use IETF\Rfc5234\Digit;

/**
 * @link
 */
interface DecOctet
{
    /**
     * ABNF: dec-octet = DIGIT                 ; 0-9
     *                 / %x31-39 DIGIT         ; 10-99
     *                 / "1" 2DIGIT            ; 100-199
     *                 / "2" %x30-34 DIGIT     ; 200-249
     *                 / "25" %x30-35          ; 250-255
     */
    const REGEX
        = '('
            . Digit::REGEX
            . '|([\x31-\x39]' . Digit::REGEX . ')'
            . '|(\x31' . Digit::REGEX . '{2}' . ')'
            . '|(\x32[\x30-\x34]' . Digit::REGEX . ')'
            . '|(\x32\x35[\x30-\x35])'
        . ')';
}
