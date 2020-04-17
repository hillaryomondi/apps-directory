<?php

namespace Strathmore\AdminListing\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Strathmore\AdminListing\AdminListing
 */
class AdminListing extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'admin-listing';
    }
}
