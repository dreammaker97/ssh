<?php
include('Net/SSH2.php');
$img = $_SERVER['QUERY_STRING'];
// if (strpos($img,"http")!=FALSE){
//     echo shell_exec("ffmpeg -i ".$img." -r 1/1 /media/usb-drive/in.png");
//     // if(shell_exec($cmd)){echo "Done";};
// }



$ssh = new Net_SSH2('192.168.0.210');
if (!$ssh->login('root', '1234567890')) {
    exit('Login Failed');
}

// echo $ssh->exec('pwd');
// $ssh->exec('ffmpeg -i '.$img.' -r 1/1 /media/usb-drive/in.png');
echo $ssh->exec('ffmpeg -loop 1 -i /media/usb-drive/in.png -t 3 -vf scale=1920:1080 -vf fps=1 /media/usb-drive/out.mp4');
?>