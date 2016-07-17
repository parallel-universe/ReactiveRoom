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
            'hardware' => array(),
            'software' => array(),
            'network' => null,
        );

        $hardware = $terminal->getHardware();
        if (!empty($hardware)) {
            foreach ($hardware as $ware) {
                $hardwareView = new HardwareView;
                $view['hardware'][] = $hardwareView->render($ware);
            }
        }

        $software = $terminal->getSoftware();
        if (!empty($software)) {
            foreach ($software as $ware) {
                $softwareView = new SoftwareView;
                $view['software'][] = $softwareView->render($ware);
            }
        }

        if (null !== ($network = $terminal->getNetwork())) {
            $networkView = new NetworkView;
            $view['network'] = $networkView->render($network);
        }

        return $view;
    }
}
