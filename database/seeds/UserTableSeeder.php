<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Using DBAL
        $conn = \EntityManager::getConnection();

        $conn->insert(
            'users',
            [
                'name' => 'Mark',
                'email' => 'mark@example.com',
                'password' => bcrypt('password'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );

        // Using Entities
        $user = new \App\User('John Doe', 'j-doe@example.com', 'password');
        \EntityManager::persist($user);
        \EntityManager::flush($user);
    }
}
