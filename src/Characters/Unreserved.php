<?php

declare(strict_types=1);

namespace IETF\Rfc3986\Characters;

use IETF\Rfc5234\Alpha;
use IETF\Rfc5234\Digit;

/**
 * @link https://datatracker.ietf.org/doc/html/rfc3986#section-2.2
 */
interface Unreserved
{
    /**
     * ABNF: unreserved  = ALPHA / DIGIT / "-" / "." / "_" / "~"
     */
    const REGEX = '('.Alpha::REGEX.'|'.Digit::REGEX.'|\-|\.|\_|\~)';
}
