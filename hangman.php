<?php
include "wordlist.php";
$rnd_word_num = array_rand($wordlist);
$rnd_word = $wordlist[$rnd_word_num];
$lettercount = strlen($rnd_word);
echo $rnd_word;
echo $lettercount;
$chars = preg_split('//', $rnd_word, -1, PREG_SPLIT_NO_EMPTY);
echo ''.print_r($chars,true).'';
?>