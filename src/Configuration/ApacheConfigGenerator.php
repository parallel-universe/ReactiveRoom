<?php
namespace ReactiveRoom\Configuration;

class ApacheConfigGenerator
{
    private $twig;
    private $productDomain;

    public function __construct(
        \Twig_Environment $twig,
        $productDomain
    ) {
        $this->twig = $twig;
        $this->productDomain = $productDomain;
    }

    public function generate($directoryPath, $logPath, $outputPath)
    {
        $vhosts = array(
            array(
                'serverName' => 'api.' . $this->productDomain,
                'directory' => 'api/public',
            ),
            array(
                'serverName' => $this->productDomain,
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
