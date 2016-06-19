<?php

namespace app\API\Controllers;


use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use Helpers;

    /**
     * Login user and return auth token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // TODO : Implement login logic
        return $request->all();
    }

    /**
     * Sign Up user
     *
     * @param Request $request
     * @return array
     */
    public function signup(Request $request)
    {
        // TODO : Implement signup logic
    }

    /**
     * Send Password Reset email
     *
     * @param Request $request
     * @return array
     */
    public function recovery(Request $request)
    {
        // TODO : Implement recovery logic
    }

    /**
     * Reset Password by given token and email
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        // TODO : Implement reset logic
    }

}