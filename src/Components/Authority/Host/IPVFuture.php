<?php

declare(strict_types=1);

namespace IETF\Rfc3986\Components\Authority\Host;

use IETF\Rfc3986\Characters\SubDelims;
use IETF\Rfc3986\Characters\Unreserved;
use IETF\Rfc5234\HexDig;

/**
 * @link https://datatracker.ietf.org/doc/html/rfc3986#section-3.2.2
 */
interface IPVFuture
{
    /**
     * ABNF: IPvFuture = "v" 1*HEXDIG "." 1*( unreserved / sub-delims / ":" )
     */
    const REGEX = '(\x76' . HexDig::REGEX . '+\.(' . Unreserved::REGEX . '|' . SubDelims::REGEX . '|\:)+)';
}
