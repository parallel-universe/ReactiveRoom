<?php
namespace ReactiveRoom\Player;

use ReactiveRoom\Terminal\TerminalModel;

class PlayerModel
{
    private $id;
    private $created;
    private $updated;
    private $username;
    private $email;
    private $password;
    private $terminalId;
    private $terminal;

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

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setTerminalId($terminalId)
    {
        $this->terminalId = $terminalId;
    }

    public function getTerminalId()
    {
        return $this->terminalId;
    }

    public function setTerminal(TerminalModel $terminal)
    {
        $this->terminal = $terminal;
        $this->setTerminalId($terminal->getId());
    }

    public function getTerminal()
    {
        return $this->terminal;
    }
}
