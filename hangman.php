<?php
include "wordlist.php";
$rnd_word = array_rand($wordlist);
echo $wordlist[$rnd_word];
$lettercount = strlen('$rnd_word');
echo $lettercount;
?>