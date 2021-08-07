<?php

declare(strict_types=1);

namespace IETF\Rfc3986\Components\Authority\IPV6Address;

use IETF\Rfc5234\HexDig;

/**
 * @link https://datatracker.ietf.org/doc/html/rfc3986#section-3.2.2
 */
interface Hs16
{
    /**
     * ABNF: h16 = 1*4HEXDIG
     *           ; 16 bits of address represented in hexadecimal
     */
    const REGEX = '(' . HexDig::REGEX . '{1,4})';
}
