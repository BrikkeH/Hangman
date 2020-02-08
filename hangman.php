<?php
include "wordlist.php";
$rnd_word = array_rand($wordlist);
$lettercount = strlen($rnd_word);
echo $rnd_word;
echo $lettercount;
?>