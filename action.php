<?php
//request of ennemy
require 'mysql.php';
//connexion
$pdo=connectMySQL();
/*---------*/

//initialisation des variable à 0
$flatskilldamage_phy = $flatskilldamage_ether = $flatskilldamage_fire =$flatskilldamage_frost = $flatskilldamage_light = $flatskilldamage_decay =  0;
$degats_raw=0;
$specialmultiplier = 1;
/*---------*/
$bonus_decay = $bonus_etheral = $bonus_fire = $bonus_frost = $bonus_light = $bonus_phy = $degats_raw =0;

$lavar = $_POST["id_ennemy"];
//query of ennemy
$queryennemy = $pdo->query("SELECT * FROM `ennemy` WHERE `imageid`='".$lavar."'");
$resultat = $queryennemy->fetch();
/*---------*/
if($resultat !== false){
//set ennemy's stats
    $HP     = $resultat['HP'];                   $phyR = $resultat['physical_resistance'];
    $fireR  = $resultat['fire_resistance'];    $frostR = $resultat['frost_resistance'];
    $lightR = $resultat['light_resistance'];   $decayR = $resultat['decay_resistance'];
    $etherR = $resultat['etheral_resistance']; $protec = $resultat['Protection'];
    $bar    = $resultat['Barrier'];
//and display them
    $ret =array("stat" => '<p>'.$HP.'</p><p>'.$protec.'</p><p>'.$bar.'</p><p>'.$phyR.' '. $fireR.' '. $frostR.' '. $decayR.' '. $lightR.' '.$etherR.'</p>');
}
/*---------*/



//request of main weapon
$privar = $_POST["id_weapon"];
//query of main weapon
$queryprimary = $pdo->query("SELECT * FROM `weapons` WHERE `imageid`='".$privar."'");
$primaresult = $queryprimary->fetch();
if($primaresult !== false){
    $primatype      = $primaresult['weapon_type'];
    $basedamage_phy     = $primaresult['physical_damage'];
    $basedamage_fire    = $primaresult['fire_damage'];
    $basedamage_frost   = $primaresult['frost_damage'];
    $basedamage_light   = $primaresult['light_damage'];
    $basedamage_decay   = $primaresult['decay_damage'];
    $basedamage_etheral = $primaresult['etheral_damage'];
    $specialmultiplier  = $primaresult['spec_multiply'];
    $bonus_phy          += $primaresult['physical_bonus'];
    $bonus_fire         += $primaresult['fire_bonus'];
    $bonus_frost        += $primaresult['frost_bonus'];
    $bonus_light        += $primaresult['light_bonus'];
    $bonus_decay        += $primaresult['decay_bonus'];
    $bonus_etheral      += $primaresult['etheral_bonus'];
}else{
    $primatype      = "none";
}



//request of secondary weapon
$secondvar = $_POST["id_second"];
//query of secondary weapon
$querysecond = $pdo->query("SELECT * FROM `weapons` WHERE `imageid`='".$secondvar."'");
$secondresult = $querysecond->fetch();
if($secondresult !== false){
    $secondtype     = $secondresult['weapon_type'];
    $basedamage_phy     = $secondresult['physical_damage'];
    $basedamage_fire    = $secondresult['fire_damage'];
    $basedamage_frost   = $secondresult['frost_damage'];
    $basedamage_light   = $secondresult['light_damage'];
    $basedamage_decay   = $secondresult['decay_damage'];
    $basedamage_etheral = $secondresult['etheral_damage'];
    $specialmultiplier  = $secondresult['spec_multiply'];
}else if($secondresult === false){
    $secondtype     = "none";
    if ($primaresult === false){
        $basedamage_decay =$basedamage_etheral = $basedamage_fire = $basedamage_frost = $basedamage_light = 0;
        $basedamage_phy = 10;}
}



//request of bullet weapon
$bulletvar = $_POST["id_arrow"];
//query of bullet weapon
$querybullet = $pdo->query("SELECT * FROM `weapons` WHERE `imageid`='".$bulletvar."'");
$bulletresult = $querybullet->fetch();
if($bulletresult !== false){
    $ammotype     = $bulletresult['weapon_type'];
    $ammo_phy     = $bulletresult['physical_damage'];
    $ammo_fire    = $bulletresult['fire_damage'];
    $ammo_frost   = $bulletresult['frost_damage'];
    $ammo_light   = $bulletresult['light_damage'];
    $ammo_decay   = $bulletresult['decay_damage'];
    $ammo_etheral = $bulletresult['etheral_damage'];
}else{
    $ammotype     = "none";
    $ammo_decay = $ammo_etheral = $ammo_fire = $ammo_frost = $ammo_light = $ammo_phy = 0;
}

//request of body armor
$bodyvar = $_POST["id_body"];
//query of body armor
$querybody = $pdo->query("SELECT * FROM `armor` WHERE `imageid`='".$bodyvar."'");
$bodyresult = $querybody->fetch();
if($bodyresult !== false){
    $bonus_phy     += $bodyresult['physical_bonus'];
    $bonus_fire    += $bodyresult['fire_bonus'];
    $bonus_frost   += $bodyresult['frost_bonus'];
    $bonus_light   += $bodyresult['light_bonus'];
    $bonus_decay   += $bodyresult['decay_bonus'];
    $bonus_etheral += $bodyresult['etheral_bonus'];
}

//request of helmet armor
$helmetvar = $_POST["id_helmet"];
//query of helmet armor
$queryhelmet = $pdo->query("SELECT * FROM `armor` WHERE `imageid`='".$helmetvar."'");
$helmetresult = $queryhelmet->fetch();
if($helmetresult !== false){
    $bonus_phy     += $helmetresult['physical_bonus'];
    $bonus_fire    += $helmetresult['fire_bonus'];
    $bonus_frost   += $helmetresult['frost_bonus'];
    $bonus_light   += $helmetresult['light_bonus'];
    $bonus_decay   += $helmetresult['decay_bonus'];
    $bonus_etheral += $helmetresult['etheral_bonus'];
}

//request of backpack armor
$backpackvar = $_POST["id_backpack"];
//query of backpack armor
$querybackpack = $pdo->query("SELECT * FROM `armor` WHERE `imageid`='".$backpackvar."'");
$backpackresult = $querybackpack->fetch();
if($backpackresult !== false){
    $bonus_phy     += $backpackresult['physical_bonus'];
    $bonus_fire    += $backpackresult['fire_bonus'];
    $bonus_frost   += $backpackresult['frost_bonus'];
    $bonus_light   += $backpackresult['light_bonus'];
    $bonus_decay   += $backpackresult['decay_bonus'];
    $bonus_etheral += $backpackresult['etheral_bonus'];
}

//request of boot armor
$bootvar = $_POST["id_boot"];
//query of boot armor
$queryboot = $pdo->query("SELECT * FROM `armor` WHERE `imageid`='".$bootvar."'");
$bootresult = $queryboot->fetch();
if($bootresult !== false){
    $bonus_phy     += $bootresult['physical_bonus'];
    $bonus_fire    += $bootresult['fire_bonus'];
    $bonus_frost   += $bootresult['frost_bonus'];
    $bonus_light   += $bootresult['light_bonus'];
    $bonus_decay   += $bootresult['decay_bonus'];
    $bonus_etheral += $bootresult['etheral_bonus'];
}


$damage_phy    =$basedamage_phy;
$damage_etheral=$basedamage_etheral;
$damage_light  =$basedamage_light;
$damage_decay   =$basedamage_decay;
$damage_fire   =$basedamage_fire;
$damage_frost  =$basedamage_frost ;


//SIMPLIFICATION
//phy


$bonus_phy=($bonus_phy/100+1);
$phyR=(1 - $phyR/100);
$damage_phy= ($damage_phy * $specialmultiplier)+ $flatskilldamage_phy;


//ether
$bonus_etheral=($bonus_etheral/100+1);
$etherR=(1 - $etherR/100);
$damage_etheral= ($damage_etheral * $specialmultiplier)+ $flatskilldamage_ether;

//fire
$bonus_fire=($bonus_fire/100+1);
$fireR=(1 - $fireR/100);
$damage_fire= ($damage_fire * $specialmultiplier)+ $flatskilldamage_fire;

//frost
$bonus_frost=($bonus_frost/100+1);
$frostR=(1 - $frostR/100);
$damage_frost= ($damage_frost * $specialmultiplier)+ $flatskilldamage_frost;

//light
$bonus_light=($bonus_light/100+1);
$lightR=(1 - $lightR/100);
$damage_light= ($damage_light * $specialmultiplier)+ $flatskilldamage_light;

//decay
$bonus_decay=($bonus_decay/100+1);
$decayR=(1 - $decayR/100);
$damage_decay= ($damage_decay * $specialmultiplier)+ $flatskilldamage_decay;

//FORMULE

if(($primatype === "bow" && $ammotype ==="arrow")  ||($secondtype === "pistol" && $ammotype === "bullet") ){
    $degats_phy  =((($damage_phy * $bonus_phy) + $ammo_phy - $protec) * $phyR);
    $degats_fire =((($damage_fire * $bonus_fire) + $ammo_fire - $bar) * $fireR);
    $degats_frost=((($damage_frost * $bonus_frost) + $ammo_frost - $bar) * $frostR);
    $degats_light=((($damage_light * $bonus_light) + $ammo_light - $bar) * $lightR);
    $degats_decay=((($damage_decay * $bonus_decay) + $ammo_decay - $bar) * $decayR);
    $degats_ether=((($damage_etheral * $bonus_etheral) + $ammo_etheral - $bar) * $etherR);
}else{
    //simple case ( main or secondary weapon only)
    $degats_phy  =((($damage_phy * $bonus_phy) - $protec) * $phyR);
    $degats_fire =((($damage_fire * $bonus_fire) - $bar) * $fireR);
    $degats_frost=((($damage_frost * $bonus_frost) - $bar) * $frostR);
    $degats_light=((($damage_light * $bonus_light) - $bar) * $lightR);
    $degats_decay=((($damage_decay * $bonus_decay) - $bar) * $decayR);
    $degats_ether=((($damage_etheral * $bonus_etheral) - $bar) * $etherR);
}
//result of the PATATE DANS LA BOUCHE
$kiche_total=$degats_phy+$degats_fire+$degats_frost+$degats_light+$degats_decay+$degats_ether+$degats_raw;


//ligne de debuging
//$debug = ("$bonus_phy=($bonus_phy/100+1)");
//$ret["resultat"] = ($debug); die (json_encode($ret["resultat"]));
$ret["resultat"] = ($kiche_total);
die (json_encode($ret));