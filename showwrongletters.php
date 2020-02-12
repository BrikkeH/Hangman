<?php
        include ('dbconn.php');
        include "wordlist.php";
        $query = "SELECT * FROM addletter";
        $sqldel = "DELETE FROM `addletter`";
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
        $char = str_split($word);

        foreach($array as $letter){
            if (strpos($word, $letter) !== false) {
                $attempts = $attempts;
            }
            else if (strpos($word, $letter) == false){
                $attempts++;
                print_r($letter ." ");
            }
            if($attempts >= 7){
                print_r('END GAME');
                if(mysqli_query($con, $sqldel)){
                    echo "Records were deleted successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                session_destroy();
                exit;
        }
    }
?>