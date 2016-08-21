
namespace YoungRichNigger9;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\Command\Command;
use pocketmine\Command\CommandSender;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\entity\Effect;
use pocketmine\utils\TextFormat;

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
 
