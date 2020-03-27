<?php
/*
Discord App Nitro Generator !
Coded By MatinME

Telegram : @MatinME
DiscordId : MatinME#9966
Github : https://github.com/matin-me
*/
#-------------------------------------------------------------------------------
$countyouwant = "5"; //Number To Try Crack
#-------------------------------------------------------------------------------
function objectToArrays( $object ){ if( !is_object( $object ) && !is_array( $object )){
    return $object;
    }
    if( is_object( $object )){
    $object = get_object_vars( $object ); }
    return array_map( "objectToArrays", $object );}
    //=====================
    function clearLog(){
        file_put_contents("nitro_cracker_log.txt", null);
    }
    function putLog($theMsg){
        $getold = file_get_contents("nitro_cracker_log.txt");
        file_put_contents("nitro_cracker_log.txt", "$getold \n $theMsg");
    }
    //=====================
function getGiftCode(){
$length = 19;
 $am = array_merge(range('a','z'), range('A','Z'), range(0, 9));
 for(; @$c < $length; @++$c)
  @$o .= $am[array_rand($am)];
 return $o;
}
//=================================
function checkCode($theCode){
    $url = "https://discordapp.com/api/v6/entitlements/gift-codes/$theCode?with_application=false&with_subscription_plan=true";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $data = curl_exec($curl);
    curl_close($curl);
    $checkapi = json_decode($data);
    $results = objectToArrays($checkapi);
    $result = $results["message"];
    $code = $results["message"];
    if($result == "You are being rate limited."){
        return "\n Rate limit reached! Please Change Your Ip";
    }
    if($result == "Unknown Gift Code"){
        return "\n Invalid: $theCode";
    }else{
        if($result !== "You are being rate limited."){
            return "\n Yaay! Founded Workable Code : https://discord.gift/$theCode";
            mkdir("codes");
            file_put_contents("codes/$theCode.txt",$theCode);
        }
    }
}
#---------------------
echo "Working...";
clearLog();
putLog(" __________________________________");
putLog("[[ Discord Nitro Cracker ]]");
putLog("By MatinME");
putLog("Telegram : @MatinME");
putLog(" DiscordId : MatinME#9966");
putLog(" GitHub : matin-me");
putLog("WebSite : www.MatinME.ir");
putLog("__________________________________");
for ($i=0; $i < $countyouwant; $i++) { 
    $BegirCode = getGiftCode();
    putLog(checkCode($BegirCode));
}
putLog(" End working...");
putLog("__________________________________");
echo "End ! Check log file.";
#---------------------
