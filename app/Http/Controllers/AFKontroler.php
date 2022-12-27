<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AFKontroler extends Controller
{


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);



        if ($validator->fails()) {

            return response()->json([
                'Poruka' => $validator->errors()
            ]);
        }


        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'Poruka' => 'Korisnik je registrovan!'
        ]);
    }




    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        if ($validator->fails()) {

            return response()->json([
                'Poruka' => $validator->errors()
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'Poruka' => 'Neuspesan login'
            ]);
        } else {

            $loginToken = $user->createToken('_Login_Token_')->plainTextToken;

            return response()->json([
                'Login token' => $loginToken
            ]);
        }
    }




    public function logout()
    {

        auth()->user()->tokens()->delete();


        return response()->json([
            'Poruka' => 'Korisnik je logoutovan'
        ]);
    }
}
