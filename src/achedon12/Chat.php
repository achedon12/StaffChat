<?php

namespace achedon12\StaffChat;

use achedon12\StaffChat\Commands\staff;
use achedon12\StaffChat\Events\PlayerEvents;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;


class Chat extends PluginBase implements Listener{

    public $onChat = [];

    protected function onEnable() : void{
        $this->getLogger()->info("plugin enable");

        $this->getServer()->getPluginManager()->registerEvents(new PlayerEvents, $this);

        $this->getServer()->getCommandMap()->registerAll('Commands',[
            new staff("staffchat","chat with your staff","/staffchat")
        ]);
    }
    public function onDisable() : void{
        $this->getLogger()->info("plugin disable");
    }
}
