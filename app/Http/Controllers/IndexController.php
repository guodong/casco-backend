<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class IndexController extends Controller
{
    public function token(Request $request)
    {
        $this->validate($request, [
            'account' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('account', $request->account)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $token = JWTAuth::fromUser($user);
            return ['token' => $token];
        }
        return Response::json([
            'error' => 'auth failed'
        ], 401);
    }
}