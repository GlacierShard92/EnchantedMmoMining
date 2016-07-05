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
     if($event->getBlock()->GetId() == 1){
   $name = $event->getPlayer()->getName();
   $inventory = $event->getPlayer()->getInventory();
   $breaks = $this->breakfile->get($name);
       $this->breakfile->set($name,$breaks+1);
       $this->breakfile->save();
       if($breaks == 20){
          $event->getPlayer()->sendMessage("§l§e[§r§2ERPE Mining McMMO§e§l]");
          $event->getPlayer()->sendMessage("§aMining level now level 1! Check your inventory for a reward!");
          $inventory->addItem(Item::get(384,0,24));
        if($breaks == 45){
          $event->getPlayer()->sendMessage("§l§e[§r§2ERPE Mining McMMO§e§l]");
          $event->getPlayer()->sendMessage("§aMining level now level 2! Check your inventory for a reward!");
          $inventory->addItem(Item::get(265,0,9));
        if($breaks == 60){
          $event->getPlayer()->sendMessage("§l§e[§r§2ERPE Mining McMMO§e§l]");
          $event->getPlayer()->sendMessage("§aMining Level now level 3! Check your inventory for a reward!");
          $inventory->addItem(Item::get(339,750,1));
        if($breaks == 100){
          $event->getPlayer()->sendMessage("§l§e[§r§2ERPE Mining McMMO§e§l]");
          $event->getPlayer()->sendMessage("§aMining Level now level 4! Check your inventory for a reward!");
          $inventory->addItem(Item::get(388,0,2));
        if($breaks == 129){
          $event->getPlayer()->sendMessage("§l§e[§r§2ERPE Mining McMMO§e§l]");
          $event->getPlayer()->sendMessage("§aMining level now level 5! Check your inventory for a reward!");
          $event->getPlayer()->sendMessage("§bYou've reached the maximum level for the beta, but your broken blocks will still go up!");
          $inventory->addItem(Item::get(264,0,10));
        }
        }
       }
      }
     }
  }
 }
     public function onCommand(CommandSender $s, Command $cmd, $label, array $args){
        switch(strtolower($command->getName())) {
          case "mining":
            if(empty($args[0])){
              $s->sendMessage("§eUse §2/mining help§e!");
              break;
            }
            if(isset($args[0]) && strtolower($args[0]) == "help") {
              $s->sendMessage("§e§l<§r§2EnchantedMMO MINING Help§e§l>");
              $s->sendMessage("§e/mining help§2 - Displays this!");
              $s->sendMessage("§e/mining stats§2 - Displays the amount of stone you've broken!");
              $s->sendMessage("§e/mining inspect [name]§2 - Displays the amount of stone someone has broken! §e[COMING IN v1.0.2]");
              $s->sendMessage("§e/mining version§2 - Displays the version of the plugin!");
              $s->sendMessage("§e/mining top§2 - Displays the top players! §e[COMING IN v1.0.2]");
              $s->sendMessage("§bCreated by GlacierShard92/Its_Joey_Yall & applqpak!");
              break;
            }
            if(isset($args[0]) && strtolower($args[0]) == "stats") {
            $breaks = $this->breakfile->get($s->getName());
            $s->sendMessage("§e§l<§r§2EnchantedMMO MINING Stats§e§l>");
            $s->sendMessage("§e§lAmount of Stone You Have Broken:");
            $s->sendMessage("§2 " . $breaks);
            break;
          }
          if(isset($args[0]) && strtolower($args[0]) == "version") {
            $s->sendMessage("§e§l<§r§2EnchantedMMO MINING Version§e§l>");
            $s->sendMessage("§9E§2R§9P§2E§b is using EnchantedMMO Mining v1.0.1 by:");
            $s->sendMessage("§aGlacierShard92/Its_Joey_Yall & applqpak!");
            break;
          }
          if(isset($args[0]) && strtolower($args[0]) == "top") {
           $s->sendMessage("§cThis has not been added yet! This will be added in§e v1.0.2!");
           break;
          }
        }
  }
}
}
