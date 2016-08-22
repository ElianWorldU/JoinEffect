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

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("§eJoinEffect §aEnabled!");
        $cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML, array(
            "Effect-id" => 1,
            "Effect-Duration" => 2400,
            "Amplifier" => 0,
            "Particles" => true
        ));
    }

    public function onLoad() {
        $this->getLogger()->info(TextFormat::YELLOW ."JoinEffect ". TextFormat::BLUE ."Loading");
    }

    public function onDisable() {
        $this->getLogger()->info(TextFormat::YELLOW ."JoinEffect ". TextFormat::RED ."Disabled");
        $cfg->save();
    }

    public function onJoin(PlayerJoinEvent $event) {
        $id = $cfg->get("Effect-id");
        $ticks = $cfg->get("Effect-Duration");
        $amplifier = $cfg->get("Amplifier");
        $particle = $cfg->get("Particles");
        $player = $event->getPlayer();
        
        $effect = Effect::getEffect($id);
          
        $effect->setDuration($ticks);
        $effect->setAmplifier($amplifier);
        $effect->setVisible($particle);
        
        if($player->hasPermission("joineffect.permission")) {
             $player->addEffect($effect);
            $player->sendMessage(TextFormat::YELLOW ."[JoinEffect] ". TextFormat::GREEN ."You recieved Effect!");
         }
    }

}
