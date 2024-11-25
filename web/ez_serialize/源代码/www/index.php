<?php
highlight_file(__FILE__);
include("flag.php");
class mylogin{
    var $user;
    var $pass;
    function __construct($user,$pass){
        $this->user=$user;
        $this->pass=$pass;
    }
    function login(){
        if ($this->user=="daydream" and $this->pass=="ok"){
            return 1;
        }
    }
}

if(!preg_match('/[oc]:\d+:/i', $_COOKIE['hhh'])){
    $hhh = unserialize($_COOKIE['hhh']);
    if($hhh->login())
    {
        echo $flag;
    }
    else{
        echo "对, 但又不完全对";
    }
}
else{
    echo "就你还想反序列化??";
}

?>
