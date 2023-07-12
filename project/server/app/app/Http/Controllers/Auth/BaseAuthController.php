<?php

namespace App\Http\Controllers\Auth;

use App\Services\UserAuthServiceInterface;
use Illuminate\Routing\Controller;

class BaseAuthController extends Controller
{
    protected UserAuthServiceInterface $service;

    public function __construct(UserAuthServiceInterface $service)
    {
        $this->service = $service;
    }
}
