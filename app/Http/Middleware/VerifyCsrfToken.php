<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/append-sub-category',
        '/append-attribute-data',
        '/fetch-product-price',
        '/switch-single-to-variable-product',
        '/switch-variable-to-single-product'
    ];
}
