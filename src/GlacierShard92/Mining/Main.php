<?php

namespace GlacierShard92\Mining;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\{Command, CommandSender};
use pocketmine\event\block\BlockBreakEvent;

use pocketmine\item\Item;
use pocketmine\utils\TextFormat as C;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {
  public function OnEnable(){
          $this->getServer()->getPluginManager()->registerEvents($this, $this);
          $this->getLogger()->info(C::AQUA . "ERPE Mining McMMO Enabled.");
          $this->saveResource("breaks.yml");
          @mkdir($this->getDataFolder());
          $this->breakfile = new Config($this->getDataFolder() . "/breaks.yml", Config::YAML);
  }
   public function OnBreak(BlockBreakEvent $event){
   $name = $event->getPlayer()->getName();
   $breaks = $this->breakfile->get($name);
       $this->breakfile->set($name,$breaks+1);
       $this->breakfile->save();
       if($breaks == 20){
          $event->getPlayer()->sendMessage("§l§e[§r§2ERPE Mining McMMO§e§l]");
          $event->getPlayer()->sendMessage("§aMining level now level 1! You've recieved 10 xp bottles!");
          $player->getInventory->addItem(Item::get(384,0,10));
        if($breaks = 45){
          $event->getPlayer()->sendMessage("§l§e[§r§2ERPE Mining McMMO§e§l]");
          $event->getPlayer()->sendMessage("§aMining level now level 2! You've recieved 5 iron ingots!");
          $player->getInventory->addItem(Item::get(265,0,5));
        if($breaks = 60){
          $event->getPlayer()->sendMessage("§l§e[§r§2ERPE Mining McMMO§e§l]");
          $event->getPlayer()->sendMessage("§aMining Level now level 3! You've recieved 3 Basic Crate Keys!");
          $player->getInventory->addItem(Item::get(341,0,3));
        if($breaks = 100){
          $event->getPlayer()->sendMessage("§l§e[§r§2ERPE Mining McMMO§e§l]");
          $event->getPlayer()->sendMessage("§aMining Level now level 4! You've recieved 10 Diamonds!");
          $event->getPlayer()->sendMessage("§bCONGRATS! You reached the max level for the Beta! More mining levels to come in the next update!");
          $player->getInventory->addItem(Item::get(364,0,10));
        }
       }
      }
     }
  }
   public function onCommand(CommandSender $s, Command $cmd, $label, array $args){
        if(strtolower($cmd->getName()) == "mining"){
          if($s instanceof Player){
          if(count($args) == 0) {
            $breaks = $this->breakfile->get($s->getName());
            $s->sendMessage("§l§e[§r§2ERPE Mining McMMO§e§l]");
            $s->sendMessage("§e§lYour Broken Blocks:§r§b " . $breaks);
            return;
          }
          if(count($args) == 1){
            $player = $args[0];
            $breaks = $this->breakfile->get($player);
            $s->sendMessage("§e§l[§r§2ERPE Mining McMMO§e§l]");
            $s->sendMessage("§e§l " . $args[0] . "'s Broken Blocks:§r§b " . $breaks);
            return;
          }
        }
  }
}
}
