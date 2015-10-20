<?php

use Illuminate\Database\Seeder;
use Doctrine\ORM\EntityManagerInterface as EntityManager;

class DatabaseSeeder extends Seeder
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);

        $this->entityManager->flush();
    }
}
