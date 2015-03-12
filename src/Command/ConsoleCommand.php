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
            ->addOption('twitter:username', null, InputOption::VALUE_REQUIRED, 'twitter username to count keywords')
            ->setHelp('to do help text');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->verifyInputTwitterUsername($input->getOption('twitter:username'));

        $app = $this->getSilexApplication();

        $twitterResponse = $app['twitterService']->getLatestTweets($input->getOption('twitter:username'));

        $twitterParsedResponse = $app['twitterResponseParseService']->parseResponse($twitterResponse);

        $this->output($twitterParsedResponse, $output);
    }

    /**
     * @param $input
     */
    private function verifyInputTwitterUsername($input)
    {
        if (empty($input)) {
            throw new \InvalidArgumentException('no twitter username supplied');
        }
    }

    /**
     * @param array $outputArray
     * @param OutputInterface $output
     */
    private function output(array $outputArray, OutputInterface $output)
    {
        foreach ($outputArray as $outputVal) {
            $output->writeln("<info>" . $outputVal . "</info>");
        }
    }
}
