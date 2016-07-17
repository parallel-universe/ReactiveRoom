<?php
namespace ReactiveRoom\Terminal;

use DateTime;

class TerminalMetadataView
{
    public function render(TerminalModel $terminal)
    {
        $view = array(
            'id' => $terminal->getId(),
            'created' => (null !== $terminal->getCreated()) ? new DateTime($terminal->getCreated()) : null,
            'updated' => (null !== $terminal->getUpdated()) ? new DateTime($terminal->getUpdated()) : null,
            'name' => $terminal->getName(),
            'ipAddress' => $terminal->getIpAddress(),
        );

        return $view;
    }
}
