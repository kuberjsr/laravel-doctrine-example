<?php

use App\User;
use App\User\UserRepository;
use Illuminate\Database\Seeder;
use Doctrine\ORM\EntityManagerInterface as EntityManager;

class UserTableSeeder extends Seeder
{
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(EntityManager $entityManager, UserRepository $userRepository)
    {
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Using DBAL
        $conn = $this->entityManager->getConnection();

        $conn->insert(
            'users',
            [
                'id' => uuid(),
                'name' => 'Mark',
                'email' => 'mark@example.com',
                'password' => bcrypt('password'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );

        // Using Entities
        $user = User::create('John Doe', 'j-doe@example.com', 'password');
        $this->userRepository->store($user);
    }
}
