<?php
include "wordlist.php";
$random_listnum = array_rand($wordlist);
echo $wordlist[$random_listnum];
?>