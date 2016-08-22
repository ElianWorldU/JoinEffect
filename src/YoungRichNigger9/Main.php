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
use pocketmine\Server;

class Main extends PluginBase implements Listener {

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("§eJoinEffect §aEnabled!");
        $cfg = new Config($this->getConfig() . "config.yml", Config::YAML, array(
            "Effect-id" => 1,
            "Effect-Duration" => 2400,
            "Amplifier" => 0,
            "Particles" => true
        ));
    }

    public function onLoad() {
        $this->getLogger()->info("§eJoinEffect §bLoading");
    }

    public function onDisable() {
        $this->getLogger()->info("§eJoinEffect §cDisable");
    }

    public function receiveEffect() {
        $cfg = $this->getConfig();
        $player = $this->getServer()->getPlayer();
        if ($player->hasPermission("joineffect.cmd")) {
            $id = $cfg->get("Effect-ID");
            $duration = $cfg->get("Duration");
            $particles = $cfg->get("Particles");
            $amplifier = $cfg->get("Amplifier");
            $player = Effect::getEffect($id);
            $player->setVisible($particles);
            $player->setAmplifier($amplifier);
            $player->setDuration($duration);
            $player->addEffect($id);
        }
    }

    public function onJoin(PlayerJoinEvent $event) {
        $cfg = $this->getConfig();
        $id = $cfg->get("Effect-id");
        $ticks = $cfg->get("Effect-Duration");
        $amplifier = $cfg->get("Amplifier");
        $particle = $cfg->get("Particles");
        $player = $event->getPlayer();
        $player->getEffect($id);
        $player->setDuration($ticks);
        $player->setAmplifier($amplifier);
        $player->setVisible($particle);
        $player->addEffect($id);
    }

}
