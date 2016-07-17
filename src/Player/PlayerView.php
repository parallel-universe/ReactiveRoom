<?php
namespace ReactiveRoom\Player;

use DateTime;
use ReactiveRoom\Terminal\TerminalView;

class PlayerView
{
    public function render(PlayerModel $player)
    {
        $view = array(
            'id' => $player->getId(),
            'created' => (null !== $player->getCreated()) ? new DateTime($player->getCreated()) : null,
            'updated' => (null !== $player->getUpdated()) ? new DateTime($player->getUpdated()) : null,
            'username' => $player->getUsername(),
            'email' => $player->getEmail(),
            'terminal' => null,
        );

        if (null !== ($terminal = $player->getTerminal())) {
            $terminalView = new TerminalView;
            $view['terminal'] = $terminalView->render($terminal);
        }

        return $view;
    }
}
