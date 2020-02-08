<?php
include "wordlist.php";
$rnd_word = array_rand($wordlist);
echo $wordlist[$rnd_word];
$lettercount = str_word_count('test');
echo $lettercount;
?>