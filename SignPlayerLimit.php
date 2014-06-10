<?php

/*
__Pocketmine Plugin__
class=Limit
Name=Sign Player Limit
Description=Sets a limit on how many players can be on a world through a sign
Author=Plugin-Devs-Forever Team
Version=1.1
apiversion=12
*/


//Remove Dev when Plugin Development is complete.
//xxxxxxxxxxxxxxxx
//CHANGELOG
//xxxxxxxxxxxxxxxx
//1.0 
//Dev Init start of Development

//1.1
//Init release of SPL
//xxxxxxxxxxxxxxxx

class Limit implements plugin{
Private $api;

public function __construct(ServerAPI $api, $server = false){
	
$this->api = $api;

}

public function init(){
	
$this->api->console->register("SPL", "Gives Inatructions on SignPlayerLimit", array($this, "send"));

 $this->api->event("tile.update", array($this, "eventHandler"));
 
 if(!file_exists($this->api->plugin->configPath($this) . "Config.yml")){
 	
 $this->Config = new Config($this->api->plugin->configPath($this). "Config.yml" , CONFIG_YAML, array(
        
        "allowplayerstobuildsplsigns" => false,
        "playersallowed" => 10,
        "allowplayerstodestroysplsigns" => false,
       
));
}
 
($this->Config = $this->api->plugin->readYAML($this->api->plugin->configPath($this) . "Config.yml"));

}


public function __destruct(){
}



public function send($cmds, $args, $issuer){
	
               $username = $issuer->username;
			   
                            $this->api->chat->sendTo(false, "Check the forums to see Instructions", $username);

          }


public function eventHandler(&$data, $event){
	
        switch ($event){
        	
            case "tile.update";
			
                if ($data->class === TILE_SIGN) {
                	
                    $usrname = $data->data['created'];
                    }
                    if ($data->data['Text1'] == "[SignPlayerLimit]"){
                            $world = $data->data['Text2'];
                    }
                    
                           if ($this->api->level->loadLevel($world) === false) {
                                $data->data['Text1'] = "[NOT FOUND]";
                                
                                $output .= "world" . $world . "is not found";
                                return $output;
                            }
                            
                            if(count($players) < $this->Config["playersallowed"]){
                             $data->data['Text3'] = "[you can join]";
                            }
                            
                            else{
                              $data->data['Text3'] = "[it's full]";
                            
                            }
                            
                            
                            
                            
                            
                    }
                    
                    
}
 public function __destruct(){}
 

}
