<?php

namespace GlacierShard92\Mining;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\{ConsoleCommandSender, Command, CommandSender};

use pocketmine\item\Item;
use pocketmine\utils\TextFormat as C;
use pocketmine\utils\Config

class Main extends PluginBase implements Listener{
  public function OnEnable(){
          $this->getServer()->getPluginManager()->registerEvents($this, $this);
          $this->getLogger()->Info(C::AQUA . "EnchantedMcMMO - Mining BETA ENABLED!");
          $this->saveResource("breaks.yml");
          @mkdir($this->getDataFolder());
          $breakfile = new Config($this->getDataFolder() . "/breaks.yml", Config::YAML);
  }
  public function OnBreak(BlockBreakEvent $event){
   $name = $event->getPlayer()->getName();
   $breaks = $breakfile->get($name);
       $breakfile->set($name,$breaks+1);
       $breakfile->save();
       if($this->$name,$breaks == 64){
          $event->getPlayer()->sendMessage(C::YELLOW . "ERPE MCMMO - Mining skill increased by 1 by mining 64 blocks!");
          $event->getPlayer()->sendMessage(C::YELLOW . "ERPE MCMMO - You now have 32 Bottle o' Enchanting in your inventory!");
          $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "give $name 384 32");
          
       }else{
          $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "give " . $name . "384 32");
       }
  public funtion onCommand(CommandSender $s, Command $cmd, $label, array $args){
        if(strtolower($cmd->getName()) == "mining"){
          if($s instanceof Player){
          if(count($args) == 0) {
            $breaks = $breakfile->get($s->getName());
            $miningstats = C::YELLOW . "§lYour Mining McMMO:§r§b $breaks";
            $s->sendMessage($miningstats);
          }
          if(count($args) == 1){
            $player = $args[0];
            $breaks = $breakfile->get($player);
            $miningstats = C::YELLOW . C::BOLD . $args[0] . "'s' Mining McMMO:§r§b $breaks";
          }
        }
  }
}
