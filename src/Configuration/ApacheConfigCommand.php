<?php
namespace ReactiveRoom\Configuration;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ApacheConfigCommand extends Command
{
    private $configGenerator;

    public function __construct(
        ApacheConfigGenerator $configGenerator
    ) {
        $this->configGenerator = $configGenerator;
        parent::__construct();
    }

    public function configure()
    {
        $this->setName('generate-apache-config');
        $this->addArgument('logPath', InputArgument::REQUIRED, 'Path to log files');
        $this->addArgument('outputDir', InputArgument::REQUIRED, 'Where to save the vhosts after creation');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->configGenerator->generate(
            realpath(__DIR__ . '/../../'),
            $input->getArgument('logPath'),
            $input->getArgument('outputDir')
        );

        $output->writeln('Done.');
    }
}
