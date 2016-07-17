<?php
namespace ReactiveRoom\Terminal;

use ReactiveRoom\Hardware\HardwareModel;
use ReactiveRoom\Software\SoftwareModel;
use ReactiveRoom\Network\NetworkModel;

class TerminalModel
{
    private $id;
    private $created;
    private $updated;
    private $name;
    private $ipAddress;
    private $hardware = array();
    private $software = array();
    private $networkId;
    private $network;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    public function addHardware(HardwareModel $hardware)
    {
        $this->hardware[] = $hardware;
    }

    public function getHardware()
    {
        return $this->hardware;
    }

    public function addSoftware(SoftwareModel $software)
    {
        $this->software[] = $software;
    }

    public function getSoftware()
    {
        return $this->software;
    }

    public function setNetworkId($networkId)
    {
        $this->networkId = $networkId;
    }

    public function getNetworkId()
    {
        return $this->networkId;
    }

    public function setNetwork(NetworkModel $network)
    {
        $this->network = $network;
        $this->setNetworkId($network->getId());
    }

    public function getNetwork()
    {
        return $this->network;
    }
}
