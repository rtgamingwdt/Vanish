<?php

namespace rtgamingwdt\Vanish;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

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
        $online = Server.getOnlinePlayers();
        $online.hidePlayer($player);
        $sender->sendMessage(TextFormat::GREEN."You have successfully vanished!.");
        return true;
      }
    } else {
      $sender->sendMessage(TextFormat::RED."Only players can use this command.");
      return true;
    }
    return false;
  }
}
