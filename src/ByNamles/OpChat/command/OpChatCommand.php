<?php

namespace ByNamles\OpChat\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class OpChatCommand extends Command
{

    public function __construct()
    {
        parent::__construct("opchat","Chatting for OP.");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!Server::getInstance()->isOp($sender->getName())){
            $sender->sendMessage(TextFormat::RED . "You don't have permission to use this command.");
            return;
        }

        if(count($args) <= 0){
            $sender->sendMessage(TextFormat::RED . 'Please enter a valid message.');
            return;
        }

        $message = implode(' ', $args);

        foreach(Server::getInstance()->getOps()->getAll(true) as $op){
            $admin = Server::getInstance()->getPlayerExact($op);
            if($admin instanceof Player)
                if($admin->isOnline())
                    $sender->sendMessage(TextFormat::DARK_GRAY . '[' . TextFormat::GOLD . 'OP' . TextFormat::DARK_PURPLE . 'Chat' . TextFormat::DARK_GRAY . '] ' . TextFormat::YELLOW . '=>' . TextFormat::RED . $message);
        }
    }

}