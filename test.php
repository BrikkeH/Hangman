<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.4.1.min.js"></script>
    <script src="random.js"></script>
    <title>Develop</title>
</head>
<body>
        <form action="addlettertodb.php" method = "POST">
            <input type="text" maxlength="1" id="letterinput" name="letterinput" onfocus="this.value=''" value="Enter a letter...">
            <input name="enter" type="submit" value="Enter"/>
        </form>
        <form action="" method = "POST">
            <input name="reset" type="submit" value="reset" />
        </form>
        

        </script>
        <?php
        include ('dbconn.php');
         session_start();
        
        $lettercorrect = 0;
        $query = "SELECT * FROM addletter";
        $array = array();

        if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1 = $row["letter"];
            echo $field1;
            $array[] = $row['letter'];
            }
        }
        echo"<br>";
        print_r($array); // show all array data
        include "wordlist.php";
        echo "<br>";
/*
            $rnd_word_num = array_rand($wordlist);
            $rnd_word = $wordlist[$rnd_word_num];
            echo $rnd_word;
        $_SESSION["woord"] = $rnd_word;
*/
        if(isset($_POST['reset']))
        {
            session_destroy();
            exit;
            session_start();
            $rand= rand(0,count($wordlist)-1);
            $word=$wordlist[$rand];
            $_SESSION["woord"] = $word;
            $sqldel = "DELETE FROM `addletter`";

            if ($conn->query($sqldel) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $attempts = 0;
        }
        if(!isset($_SESSION['woord']))
        {
            $rand= rand(0,count($wordlist)-1);
            $word=$wordlist[$rand];
            $_SESSION["woord"] = $word;
        }
        else{
            $word=$_SESSION["woord"];
        }
        echo $word;
        $maxattempts = 7;
        $attempts = 0;
        $char = str_split($word);

        foreach(str_split($word) as $char) {
            if (in_array($char, $array, true)) {
                print_r(' ' .$char);
            } 
            else if (!in_array($char, $array, true)) {
                echo ' _ ';
            } 
        } 
        echo "<br>";
        foreach($array as $letter){
            if (strpos($word, $letter) !== false) {
                $attempts = $attempts;
                print_r($letter);
            }
            else if (strpos($word, $letter) == false){
                $attempts++;
            }
            if($attempts >= 7){
                print_r('END GAME');
        }
    }
        echo "<br>";
        echo $attempts;
        ?>
</body>
</html>