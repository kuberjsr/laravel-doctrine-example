<?php

namespace App\User;

use App\User;

interface UserRepository
{
    /**
     * @param User $user
     */
    public function store(User $user);

    /**
     * @param User $user
     */
    public function storeImmediately(User $user);
}