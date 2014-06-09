<?php

/*
__Pocketmine Plugin__
Name=Sign Player Limit
Description=Sets a limit on how many players can be on a world through a sign
Version=1.0 Dev
Author=Plugin-Devs-Forever Team
Class=Limit
apiversion=12
*/

/*
Remove Dev when Plugin Development is complete.
xxxxxxxxxxxxxxxx
CHANGELOG
xxxxxxxxxxxxxxxx
1.0 Dev Init start of Development
xxxxxxxxxxxxxxxx
*/

class Limit implements plugin{
Private $api

public function __construct(ServerAPI $api, $server = false){
$this->api = $api

}

public function init(){
 $this->api->event("player.block.touch", array($this, "eventHandler");
 $this->api->event("tile.update", array($this, "eventHandler");
 $this->config = new Config($this->api->plugin->configPath($this). "Config.yml" , CONFIG_YAML, array(
        AllowPlayersToBuildSPLSigns => false
        AllowPlayersToDestroySPLsigns => true
       
);

}

public function __destruct(){}

public function eventHandler(&$data, $event){
        switch ($event) {
            case "tile.update":
                if ($data->class === TILE_SIGN) {
                    $usrname = $data->data['created'];
                    if ($data->data['Text1'] == "[SignPlayerLimit]"){
                            $mapname = $data->data['Text2'];
                           if ($this->api->level->loadLevel($mapname) === false) {
                                $data->data['Text1'] = "[NOT FOUND]";
                                $this->api->chat->sendTo(false, "[SignPlayerLimit] World $mapname not found!", $usrname);
                                return false;
                            }
                            return true;
                        }
                    }
            break;
            
                            
                            
                            
                            
             
