<?php
namespace ReactiveRoom\Software;

use DateTime;

class SoftwareView
{
    public function render(SoftwareModel $software)
    {
        $view = array(
            'id' => $software->getId(),
            'created' => (null !== $software->getCreated()) ? new DateTime($software->getCreated()) : null,
            'updated' => (null !== $software->getUpdated()) ? new DateTime($software->getUpdated()) : null,
            'name' => $software->getName(),
            'type' => $software->getType(),
            'level' => $software->getLevel(),
        );

        return $view;
    }
}
