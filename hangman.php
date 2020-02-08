<?php
include "wordlist.php";
$rnd_word_num = array_rand($wordlist);
$rnd_word = $wordlist[$rnd_word_num];
$lettercount = strlen($rnd_word);
echo $rnd_word;
echo $lettercount;
?>