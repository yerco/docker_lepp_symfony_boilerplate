<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function index()
    {
        $connection = $this->entityManager->getConnection();
        $sql = 'SELECT * FROM sometable';
        $statement = $connection->prepare($sql);
        $statement->execute();
        $data = $statement->fetchAll();
        $id = $data[0]['id'];
        return new Response("<body><h1>index id: $id</h1></body>");
    }
}
