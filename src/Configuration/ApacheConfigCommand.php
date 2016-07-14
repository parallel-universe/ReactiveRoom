<?php
namespace ReactiveRoom\Configuration;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ApacheConfigCommand extends Command
{
    public function configure()
    {
        $this->setName('generate-apache-config');
        $this->addArgument('logPath', InputArgument::REQUIRED, 'Path to log files');
        $this->addArgument('outputDir', InputArgument::REQUIRED, 'Where to save the vhosts after creation');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $config = file_get_contents(__DIR__ . '/../../config.json');
        $config = json_decode($config, true);

        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../');
        $twig = new \Twig_Environment($loader);

        $apacheConfigGenerator = new ApacheConfigGenerator($twig, $config);
        $apacheConfigGenerator->generate(
            realpath(__DIR__ . '/../../'),
            $input->getArgument('logPath'),
            $input->getArgument('outputDir')
        );

        $output->writeln('Done.');
    }
}
