<?php

namespace TwitterCountKeyword\Command;

use Knp\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('twitter:count:keyword')
            ->setDescription(
                'accepts twitter account name and outputs keyword frequency for the past 100 tweets'
            )
            ->setHelp('to do help text');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        var_dump('!');
    }
}
