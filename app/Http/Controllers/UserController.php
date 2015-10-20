<?php

namespace App\Http\Controllers;

use App\User\UserRepository;
use App\Http\Requests;


class UserController extends Controller
{
    /**
     * @var \App\User\UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        $allUsers = $this->userRepository->all(15);

        return view('user.all')->with('allUsers', $allUsers);
    }
}
