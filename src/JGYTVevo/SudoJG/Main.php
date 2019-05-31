<?php

namespace JGYTVevo\SudoJG;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat as c;

class Main extends PluginBase implements Listener{

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        if(strtolower($command->getName()) == "sjg"){
            if($sender instanceof Player){
                if($sender->hasPermission("sjg.command")){
                    if(count($args) === 0 || count($args) === 1){
                        $sender->sendMessage("Usage: /sjg <player> <message or /command..>");
                    }else{
                        $player = $this->getServer()->getPlayer($args[0]);
                        if($player !== null){
                            $player->chat(implode(" ", array_slice($args, 1, 1000)));
                        }else{
                            $sender->sendMessage(c::RED.$args[0]." is not online");
                        }
                    }
                }
            }else{
                $this->getLogger()->warning(c::RED." You can not use this command in console!");
            }
        }
        return true;
    }
    
    
    }
}
