<?php

namespace YoungRichNigger9;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\Command\Command;
use pocketmine\Command\CommandSender;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\entity\Effect;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {
 public function onEnable(){
	$this->saveDefaultConfig();
	$this->reloadConfig();
	$this->getServer()->getPluginManager()->registerEvents($this,$this);
	$this->getLogger()->info("§eJoinEffect §aEnabled!");
    }
  public function onLoad(){
  $this->getLogger()->info("§eJoinEffect §bLoading");
  }
  public function onDisable(){
  $this->getLogger()->info("§eJoinEffect §cDisable");
 }
 public function onJoin(PlayerJoinEvent $event) {
  $cfg = $this->getConfig();
	$level = $p->getLevel();
	if($p->hasPermission("joineffect.cmd")){
	    $effectid = $cfg->get("Effect-ID");
	    $duration = $cfg->get("Duration");
	    $particles = $cfg->get("Particles");
	    $amplifier = $cfg->get("Amplifier");
	    $health = $cfg->get("Fill-Player-Health");
	    $effect = Effect::getEffect($effectid);
	    $effect->setVisible($particles);
	    $effect->setAmplifier($amplifier);
	    $effect->setDuration($duration);
	    $p->addEffect($effect);
 }
 }
 }
 
