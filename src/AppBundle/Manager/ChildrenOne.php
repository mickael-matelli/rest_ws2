<?php

namespace AppBundle\Manager;

use AppBundle\Manager\ParentT;

class ChildrenOne extends ParentT
{

    public function getNameCommand($name)
    {
        $this->logger->info('bonjour ' . $name);
        $this->logger->warning('vous êtes connecté');
    }

}
