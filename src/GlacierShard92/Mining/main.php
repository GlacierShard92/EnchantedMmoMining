<?php

namespace GlacierShard92\Mining

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\{Command, CommandSender};
use pocketmine\item\Item;
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase implements Listener{
  public function OnEnable(){
          $this->getServer()->getPluginManager()->registerEvents($this, $this);
          $this->getLogger()->Info(C::AQUA . "EnchantedMcMMO - Mining BETA ENABLED!");
          $this->saveResource("breaks.yml");
          @mkdir($this->getDataFolder());
          $breakfile = new Config($this->getDataFolder() . "/breaks.yml", Config::YAML);
          $breakfile->save();
  }
  public function OnBreak(BlockBreakEvent $event){
   $name = $event->getPlayer()->getName();
   $breakdata = new Config($this->getDataFolder() . "/breaks.yml", Config::YAML);
   $breaks = $breakdata->get($name);
       $breakdata->set($name,$breaks+1);
       $breakdata->save();
       ***FINISH LATER***
