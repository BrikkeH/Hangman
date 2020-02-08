<?php
include "wordlist.php";
$rnd_word = array_rand($wordlist);
$lettercount = strlen($rnd_word);
echo $wordlist[$rnd_word];
echo $lettercount;
?>