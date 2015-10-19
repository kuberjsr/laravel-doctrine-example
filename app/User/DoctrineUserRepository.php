<?php

namespace App\User;

use App\User;
use Doctrine\ORM\EntityRepository;

class DoctrineUserRepository extends EntityRepository implements UserRepository
{
    public function store(User $user)
    {
        $this->getEntityManager()->persist($user);
    }

    public function storeImmediately(User $user)
    {
        $em = $this->getEntityManager();

        $em->persist($user);
        $em->flush($user);
    }


}