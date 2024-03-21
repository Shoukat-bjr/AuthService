<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Jobs\UserCreatedJob;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function store(UserRequest $request)
    {
        try {
            $user = User::create($request->validated());

            UserCreatedJob::dispatch($user->toArray());

            return response()->json([
                'error' => false,
                'message' => 'success'
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage() // Or a more generic message for security
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
