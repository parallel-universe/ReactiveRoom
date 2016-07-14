<?php
namespace ReactiveRoom\Configuration;

class ApacheConfigGenerator
{
    private $twig;
    private $config;

    public function __construct(
        \Twig_Environment $twig,
        $config
    ) {
        $this->twig = $twig;
        $this->config = $config;
    }

    public function generate($directoryPath, $logPath, $outputPath)
    {
        $vhosts = array(
            array(
                'serverName' => 'api.' . $this->config['product']['domain'],
                'directory' => 'api/public',
            ),
            array(
                'serverName' => $this->config['product']['domain'],
                'directory' => 'app',
            ),
        );

        foreach ($vhosts as $vhost) {
            $this->createVhost(
                $vhost,
                $directoryPath,
                $logPath,
                $outputPath
            );
        }
    }

    private function createVhost($vhost, $directoryPath, $logPath, $outputPath)
    {
        $content = $this->twig->render(
            'resources/apache_config.twig',
            array(
                'vhost' => $vhost,
                'directoryPath' => $directoryPath,
                'logPath' => $logPath,
            )
        );

        file_put_contents($outputPath . '/' . $vhost['serverName'], $content);
    }
}
