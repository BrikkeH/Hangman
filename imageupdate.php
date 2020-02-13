<?php
        include ('dbconn.php');
        include "wordlist.php";
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $query = "SELECT * FROM addletter";
        $array = array();

        //GET ALL LETTERS FROM DATABASE AND MAKE ARRAY
        if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1 = $row["letter"];
            $array[] = $row['letter'];
            }
        }

        //RANDOM WOORD BEHOUDEN ALS HET NIET GERADEN IS EN WOORD UITPRINTEN
        if(!isset($_SESSION['woord']))
        {
            $rand= rand(0,count($wordlist)-1);
            $word=$wordlist[$rand];
            $_SESSION["woord"] = $word;
        }
        else{
            $word=$_SESSION["woord"];
        }
        $attempts = 0;
        $wordlength = strlen($word);
        $char = str_split($word);

        foreach($array as $letter){
            if (strpos($word, $letter) !== false) {
                $attempts = $attempts;
            }
            else if (strpos($word, $letter) == false){
                $attempts++;
            }
    }
    $image = "images/".($attempts+1).".png";
 ?>
