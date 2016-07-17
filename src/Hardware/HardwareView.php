<?php
namespace ReactiveRoom\Hardware;

use DateTime;

class HardwareView
{
    public function render(HardwareModel $hardware)
    {
        $view = array(
            'id' => $hardware->getId(),
            'created' => (null !== $hardware->getCreated()) ? new DateTime($hardware->getCreated()) : null,
            'updated' => (null !== $hardware->getUpdated()) ? new DateTime($hardware->getUpdated()) : null,
            'name' => $hardware->getName(),
            'type' => $hardware->getType(),
            'level' => $hardware->getLevel(),
        );

        return $view;
    }
}
