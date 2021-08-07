<?php

declare(strict_types=1);

namespace IETF\Rfc3986\Components\Authority\Host\IPV6Address;

use IETF\Rfc3986\Components\Authority\Host\IPV4Address;

/**
 * @link https://datatracker.ietf.org/doc/html/rfc3986#section-3.2.2
 */
interface Ls32
{
    /**
     * ABNF: ls32 = ( h16 ":" h16 ) / IPv4address
     *            ; least-significant 32 bits of address
     */
    const REGEX = '((' . Hs16::REGEX . '\:' . Hs16::REGEX . ')|' . IPV4Address::REGEX . ')';
}
