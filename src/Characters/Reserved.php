<?php

declare(strict_types=1);

namespace IETF\Rfc3986\Characters;

/**
 * @link https://datatracker.ietf.org/doc/html/rfc3986#section-2.2
 */
interface Reserved
{
    /**
     * ABNF: 'reserved = gen-delims / sub-delims'
     */
    const REGEX = '('.GenDelims::REGEX.'|'.SubDelims::REGEX.')';
}
