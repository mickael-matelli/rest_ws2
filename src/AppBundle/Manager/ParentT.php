<?php

namespace AppBundle\Manager;

use Symfony\Component\HttpKernel\Log\LoggerInterface;
use Doctrine\Common\Persistence\ObjectManager;

abstract class ParentT
{
    protected $entityManager;
    protected $logger;

    public function __construct(ObjectManager $manager)
    {
        $this->entityManager = $manager;
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

}
