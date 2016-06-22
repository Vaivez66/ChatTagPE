<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 22/06/2016
 * Time: 12:03
 */

namespace Vaivez66\ChatTagPE;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerQuitEvent;

class ChatTagListener implements Listener{

    public function __construct(ChatTag $plugin){
        $this->plugin = $plugin;
    }

    public function onChat(PlayerChatEvent $event){
        $p = $event->getPlayer();
        if($p->hasPermission('chat.tag.bypass')){
            return;
        }
        $this->plugin->players[$p->getName()] = $p;
        $this->plugin->nametags[$p->getName()] = $p->getNameTag();
        $p->setNameTag($this->plugin->getKey('chat.nametag', ['nametag' => $p->getNameTag(), 'message' => $event->getMessage()]));
        $this->plugin->runTask($p);
    }

    public function onQuit(PlayerQuitEvent $event){
        $p = $event->getPlayer();
        if(isset($this->plugin->players[$p->getName()])){
            unset($this->plugin->players[$p->getName()]);
        }
    }

}
