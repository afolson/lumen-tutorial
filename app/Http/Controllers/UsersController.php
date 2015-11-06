<?php
/**
 * Users controller
 */
namespace App\Http\Controllers;

use App\Transformers\CheckinTransformer;
use App\Transformers\UserTransformer;

class UsersController extends ApiController {
    public function index()
    {
        $users = User::take(10)->with('checkins', 'checkins.place')->get();

        return $this->respondWithCORS($users, new UserTransformer);
    }

    public function show($userId)
    {
        $user = User::find($userId);

        if (! $user) {
            return $this->errorNotFound('User not found');
        }

        return $this->respondWithItem($user, new UserTransformer);
    }

    public function getCheckins($userId)
    {
        $user = User::find($userId);

        if (! $user) {
            return $this->errorNotFound('User not found');
        }

        return $this->respondWithCORS($user->checkins, new CheckinTransformer);
    }
}