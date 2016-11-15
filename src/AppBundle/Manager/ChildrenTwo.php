<?php

namespace AppBundle\Manager;

use AppBundle\Manager\ParentT;

class ChildrenTwo extends ParentT
{

    public function delete($name)
    {
        $this->logger->info('delete => ' . $name);
    }

}
