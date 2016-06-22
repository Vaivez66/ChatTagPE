<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 22/06/2016
 * Time: 12:06
 */

namespace Vaivez66\ChatTagPE;

use pocketmine\Player;
use pocketmine\scheduler\PluginTask;

class ChatTagTask extends PluginTask{

    private $plugin;
    private $p;

    public function __construct(ChatTag $plugin, Player $p){
        $this->plugin = $plugin;
        $this->p = $p;
        parent::__construct($plugin);
    }

    public function onRun($tick){
        if(isset($this->plugin->players[$this->p->getName()])){
            unset($this->plugin->players[$this->p->getName()]);
            $this->p->setNameTag($this->plugin->nametags[$this->p->getName()]);
        }
        else{
            $this->plugin->getServer()->getScheduler()->cancelTask($this->getTaskId());
        }
    }

}
