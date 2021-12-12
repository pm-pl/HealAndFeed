<?php

namespace Kylan1940\HealAndFeed;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {

   public function onEnable() : void {
        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
   }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
        if($sender instanceof Player){
                if($cmd->getName() == "heal"){
                    $sender->setHealth($sender->getMaxHealth());
                    $sender->sendMessage($this->getConfig()->get("message-heal"));
                } 
                if($cmd->getName() == "feed"){
                    $sender->setFood(20);
                    $sender->setSaturation(20);
                    $sender->sendMessage($this->getConfig()->get("message-feed"));
                } 
        }
        return true;
    }
}