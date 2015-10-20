<?php

namespace App\User;

use App\User;
use Doctrine\ORM\EntityRepository;
use LaravelDoctrine\ORM\Pagination\Paginatable;

class DoctrineUserRepository extends EntityRepository implements UserRepository
{
    use Paginatable;

    public function all($perPage = null, $pageName = null)
    {
        $queryBuilder = $this->createQueryBuilder('u');
        $queryBuilder->orderBy('u.name', 'asc');

        if ($perPage === null) {
            return $queryBuilder->getQuery()->execute();
        }

        return $this->paginate($queryBuilder->getQuery(), $perPage, $pageName === null ? 'page' : $pageName);
    }

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
