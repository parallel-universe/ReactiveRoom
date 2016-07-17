<?php
namespace ReactiveRoom\Terminal;

use DateTime;
use ReactiveRoom\Hardware\HardwareView;
use ReactiveRoom\Software\SoftwareView;
use ReactiveRoom\Network\NetworkView;

class TerminalView
{
    public function render(TerminalModel $terminal)
    {
        $view = array(
            'id' => $terminal->getId(),
            'created' => (null !== $terminal->getCreated()) ? new DateTime($terminal->getCreated()) : null,
            'updated' => (null !== $terminal->getUpdated()) ? new DateTime($terminal->getUpdated()) : null,
            'name' => $terminal->getName(),
            'ipAddress' => $terminal->getIpAddress(),
            'hardware' => null,
            'software' => null,
            'network' => null,
        );

        if (null !== ($hardware = $terminal->getHardware())) {
            $hardwareView = new HardwareView;
            $view['hardware'] = $hardwareView->render($hardware);
        }

        if (null !== ($software = $terminal->getSoftware())) {
            $softwareView = new SoftwareView;
            $view['software'] = $softwareView->render($software);
        }

        if (null !== ($network = $terminal->getNetwork())) {
            $networkView = new NetworkView;
            $view['network'] = $networkView->render($network);
        }

        return $view;
    }
}
