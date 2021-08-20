<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function list()
    {
        return response([
            'data' => User::all()
        ]);
    }

    public function checkAbility(Request $request)
    {
        $req = $request->all();

        $user = User::find($req['user_id']);
        $roles = $req['roles'] ? $req['roles'] : '';
        $permissions = $req['permissions'] ? $req['permissions'] : '';
        
        $abilityOpt = array(
            'validate_all' => false,
            'return_type' => 'both',
        );
        return response([
            'data' => $user->ability($roles, $permissions, $abilityOpt)
        ]);
    }
}
