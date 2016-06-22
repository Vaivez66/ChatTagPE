<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 22/06/2016
 * Time: 12:02
 */

namespace Vaivez66\ChatTagPE;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;

class ChatTag extends PluginBase{

    /** @var Config $cfg */
    private $cfg;
    public $nametags = [];
    public $players = [];

    public function onEnable(){
        $this->saveResource('config.yml');
        $this->cfg = new Config($this->getDataFolder() . 'config.yml', Config::YAML, []);
        $this->getLogger()->info(TF::GREEN . 'ChatTagPE is ready');
        $this->getServer()->getPluginManager()->registerEvents(new ChatTagListener($this), $this);
    }

    public function runTask(Player $p){
        $a = new ChatTagTask($this, $p);
        $b = $this->getServer()->getScheduler()->scheduleDelayedTask($a, 20 * $this->getKey('delay.time'));
        $a->setHandler($b);
    }

    public function getKey($key, $replaces = null){
        $result = $this->getFormat()->translate($this->cfg->get($key));
        if($replaces != null){
            foreach($replaces as $k => $v){
                $result = str_replace('{' . $k . '}', $v, $result);
            }
        }
        return $result;
    }

    public function getFormat(){
        return new ChatTagFormat($this);
    }

}
