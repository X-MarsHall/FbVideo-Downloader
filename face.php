<?php

    echo "
    ___ _     __   ___    _                       
    | __| |__  \ \ / (_)__| |___ ___               
    | _|| '_ \  \ V /| / _` / -_) _ \                    Author : MarsHall
    |_| |_.__/   \_/ |_\__,_\___\___/                    Team   : Xai Syndicate
    ___                  _              _                Github : https://github.com/X-MarsHall
    |   \ _____ __ ___ _ | |___  __ _ __| |___ _ _ 
    | |) / _ \ V  V / ' \| / _ \/ _` / _` / -_) '_|
    |___/\___/\_/\_/|_||_|_\___/\__,_\__,_\___|_|  
    
    ";
    echo "\n";
    echo "[+] Masukkan Url Video : ";
    $url = trim(fgets(STDIN));
    echo "[+] Name To Save As : ";
    $name = trim(fgets(STDIN));
    echo "\n[+] Downloading .... \n\n";
function curl($co) {
   $curl = curl_init($co);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 5.1.1; SM-T285) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.162 Safari/537.36");
   curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
   $content = curl_exec($curl);
   curl_close($curl);
   return $content;
}
   $co = str_replace('www', 'mbasic', $url);
   $s = curl($co);
   $vur = preg_match('/<a href=\"\/video_redirect\/\?src\=(.*?)\"/ims', $s, $matches) ? $matches[1] : null;
   $u = urldecode($vur);
   $d = 'wget -O "' . $name . '.mp4" --user-agent="Mozilla/5.0 (Linux; Android 5.1.1; SM-T285) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.162 Safari/537.36" "' . $u . '" -q --show-progress';
   system($d);
   echo "\n[+] Done : " . $name . ".mp4\n";
   exit(0);

?>