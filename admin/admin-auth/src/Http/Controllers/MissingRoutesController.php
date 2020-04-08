<?php

namespace Strathmore\AdminAuth\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class MissingRoutesController extends Controller
{
    /**
     * Display default admin home page
     *
     * @return RedirectResponse
     */
    public function redirect(): RedirectResponse
    {
        return Redirect::route('strathmore/admin-auth::admin/login');
    }
}
