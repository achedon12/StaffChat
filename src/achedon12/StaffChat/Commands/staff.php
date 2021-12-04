<?php

namespace achedon12\StaffChat\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
use pocketmine\Server;

class staff extends Command{

    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
        $this->setPermission("use.staffchat");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player){
            if($sender->hasPermission("use.staffchat")){
                if(isset($this->onChat[$sender->getName()])){
                    unset($this->onChat[$sender->getName()]);
                    $sender->sendMessage("§f[§3StaffChat disable§f]");
                }else{
                    $this->onChat[$sender->getName()] = $sender->getName();
                    $sender->sendMessage("§f[§3StaffChat enable§f]");
                }
            }else{
                $sender->sendMessage("§4/!\ §fYou don't have the permission to use this command");
            }
        }else{
            $sender->sendMessage("Command to use in game");
        }
    }


}