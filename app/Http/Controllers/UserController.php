<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Core\Application\Service\User\RegisterUser\RegisterUserRequest;
use App\Core\Application\Service\User\RegisterUser\RegisterUserService;

class UserController extends Controller
{
    public function create(Request $request, RegisterUserService $service)
    {
        $request->validate(
            [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
      ]
        );

        $req = new RegisterUserRequest(
            $request->input('name'),
            $request->input('email'),
            $request->file('image'),
            $request->input('password'),
        );

        DB::beginTransaction();
        try {
            $service->execute($req);
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return response()->json(['message' => 'success']);
    }
}