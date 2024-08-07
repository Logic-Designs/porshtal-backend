<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return Response::success(UserResource::collection($users), 'Users retrieved successfully');
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return Response::success(new UserResource($user), 'User created successfully', [], 201);
    }

    public function show(User $user)
    {
        return Response::success(new UserResource($user), 'User retrieved successfully');
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name ?: $user->name,
            'email' => $request->email ?: $user->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return Response::success(new UserResource($user), 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return Response::success(null, 'User deleted successfully', [], 204);
    }
}
