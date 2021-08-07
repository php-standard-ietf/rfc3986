<?php

declare(strict_types=1);

namespace IETF\Rfc3986\Components\Authority\Host;

use IETF\Rfc3986\Components\Authority\IPV4Address\DecOctet;

/**
 * @link https://datatracker.ietf.org/doc/html/rfc3986#section-3.2.2
 */
interface IPV4Address
{
    /**
     * ABNF: IPv4address = dec-octet "." dec-octet "." dec-octet "." dec-octet
     */
    const REGEX
        = '(' . DecOctet::REGEX . '\.' . DecOctet::REGEX . '\.' . DecOctet::REGEX
        . '\.' . DecOctet::REGEX . ')';
}
