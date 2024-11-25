<?php
include("flag.php");
highlight_file(__FILE__);

if (isset($_POST['a']) && isset($_POST['b'])) {
    if ($_POST['a'] != $_POST['b']) {
        if (md5($_POST['a']) === md5($_POST['b'])) {
            echo $flag;
        } else {
            print 'Wrong.';
        }
    }
}
?>