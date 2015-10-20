<?php

namespace App\User;

use App\User;

interface UserRepository
{
    public function all($perPage = null, $pageName = null);

    /**
     * @param User $user
     */
    public function store(User $user);

    /**
     * @param User $user
     */
    public function storeImmediately(User $user);
}
