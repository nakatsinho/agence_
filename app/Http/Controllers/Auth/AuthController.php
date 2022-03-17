<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function postSignin(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'co_usuario' => 'required',
            'ds_senha' => 'required',
        ]);

        $fieldType = filter_var($request->co_usuario, FILTER_VALIDATE_EMAIL) ? 'co_usuario' : 'no_email';

        // $user = User::query()->where($fieldType, '=', $input['co_usuario'])
        //     ->first();

        // if (!$user) {
        //     return redirect()->route('login')
        //         ->with('error','Você não tem permissão para aceder ao back-office.');
        // }

        if(!auth()->attempt(array('co_usuario' => $input['co_usuario'], 'ds_senha' => $input['ds_senha'])))
        {
            return redirect()->route('home');
        }else{
            return [$request->co_usuario,$request->ds_senha];
            return redirect()->route('login')
                ->with('error','Email/Username ou Password incorrectos');
        }
        
    }
}
