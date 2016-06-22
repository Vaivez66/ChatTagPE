/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 22/06/2016
 * Time: 12:05
 */

namespace Vaivez66\ChatTagPE;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;

class ChatTagCommand implements CommandExecutor{

    public function __construct(ChatTag $plugin){
        $this->plugin = $plugin;
    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        // TODO: Implement onCommand() method.
    }

}
