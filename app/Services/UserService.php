<?php


namespace App\Services;


use App\Models\User;

class UserService
{
    /**
     * @param User $user
     */
    public function saveUser(User $user) {
        $user->save();
    }
}
