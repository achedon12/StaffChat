<?php

namespace achedon12\StaffChat\Events;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\Server;

class PlayerEvents implements Listener{

    public function onChat(PlayerChatEvent $event){
        $player = $event->getPlayer();
        if(isset($this->onChat[$player->getName()])){
            foreach (Server::getInstance()->getOnlinePlayers() as $p){
                $event->cancel();
                $p->sendMessage("[StaffChat]".$player->getName().">>".$event->getMessage());
                Server::getInstance()->getLogger()->info("[StaffChat]".$player->getName().">>".$event->getMessage());
            }
        }
    }
}