<?php

declare(strict_types=1);

namespace IETF\Rfc3986\Characters;

use IETF\Rfc5234\HexDig;

/**
 * @link https://datatracker.ietf.org/doc/html/rfc3986#section-2.1
 */
interface PercentEncoding
{
    /**
     * ABNF: pct-encoded = "%" HEXDIG HEXDIG
     */
    const REGEX = '(%'.HexDig::REGEX.HexDig::REGEX.')';
}
