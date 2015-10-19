<?php

namespace App\Http\Middleware;

use Doctrine\ORM\EntityManagerInterface;

class FlushEntityManager
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle($request, \Closure $next)
    {
        $response = $next($request);

        $this->entityManager->flush();

        return $response;
    }
}
