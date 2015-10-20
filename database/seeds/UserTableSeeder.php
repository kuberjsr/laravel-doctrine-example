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
    /**
     * @var \Faker\Generator
     */
    private $faker;

    public function __construct(EntityManager $entityManager, UserRepository $userRepository, Faker\Generator $faker)
    {
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
        $this->faker = $faker;
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

        // Create multiple
        for ($i = 0; $i < 50; $i++) {
            $user = User::create($this->faker->name, $this->faker->email, str_random(10));
            $this->userRepository->store($user);
        }
    }
}
