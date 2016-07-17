<?php
namespace ReactiveRoom\Network;

class NetworkView
{
    public function render(NetworkModel $network)
    {
        $view = array(
            'id' => $network->getId(),
            'created' => (null !== $network->getCreated()) ? new DateTime($network->getCreated()) : null,
            'updated' => (null !== $network->getUpdated()) ? new DateTime($network->getUpdated()) : null,
            'name' => $network->getName(),
        );

        return $view;
    }
}
