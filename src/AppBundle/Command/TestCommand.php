<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class TestCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this->setName('test:akime')
            ->addArgument('name', InputArgument::OPTIONAL, 'ok', 'mika')
            ->setDescription('command test');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();

        $child1 = $container->get('service.user.children1');
        $child2 = $container->get('service.user.children2');
        $name = $input->getArgument('name');
        $child1->getNameCommand($name);
        $child2->delete($name);
        $output->writeln('votre nom est ' . $name);
        $myService = $container->get('service.my');
        $output->writeln($myService->getMessage());
    }

}
