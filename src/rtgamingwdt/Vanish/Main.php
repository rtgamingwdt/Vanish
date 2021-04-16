<?php

namespace rtgamingwdt\Vanish;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

use pocketmine\plugin\PluginBase;

use pocketmine\utils\TextFormat;

class Main extends PluginBase {
  
  public function onEnable() {
    
  }
  
  public function onDisable() {
    
  }
  
  public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {
    if($sender instanceof Player) {
      
      $player = $sender->getPlayer();
      
      if($label === "vanish") {
        if($sender->isOp()) {
          foreach($this->getServer()->getOnlinePlayers() as $online){
            $online->hidePlayer($player);
            $sender->sendMessage(TextFormat::GREEN."You have been successfully Vanished!");
          }
        } else {
          $sender->sendMessage(TextFormat::RED."Access Denied. You do not have the right permissions.");
        }
      }
      
      if($label === "unvanish") {
        if($sender->isOp()) {
          foreach($this->getServer()->getOnlinePlayers() as $online){
            $online->showPlayer($player);
            $sender->sendMessage(TextFormat::GREEN."You have been successfully Unvanished!");
          }
        } else {
          $sender->sendMessage(TextFormat::RED."Access Denied. You do not have the right permissions.");
        }
      }
    } else {
      $sender->sendMessage(TextFormat::RED."Only players can use this command.");
      return true;
    }
    return false;
  }
}
