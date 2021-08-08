<?php

declare(strict_types=1);

namespace IETF\Rfc3986\Components\Authority\Host;

use IETF\Rfc3986\Characters\PercentEncoding;
use IETF\Rfc3986\Characters\SubDelims;
use IETF\Rfc3986\Characters\Unreserved;

/**
 * @link https://datatracker.ietf.org/doc/html/rfc3986#section-3.2.2
 */
interface RegName
{
    /**
     * ABNF: reg-name = *( unreserved / pct-encoded / sub-delims )
     */
    const REGEX = '((' . Unreserved::REGEX . '|' . PercentEncoding::REGEX . '|' . SubDelims::REGEX . ')*)';
}
