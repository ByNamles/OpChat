<?php

namespace ByNamles\OpChat;

use ByNamles\OpChat\command\OpChatCommand;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class OpChat extends PluginBase{

    public function onEnable(): void
    {
        Server::getInstance()->getCommandMap()->register("opchat",new OpChatCommand());
    }
}