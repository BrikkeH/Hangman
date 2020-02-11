<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="addlettertodb.php" method = "POST">
            <input type="text" maxlength="1" id="letterinput" name="letterinput" onfocus="this.value=''" value="Enter a letter...">
            <input type="submit" onfocus="this.value=''" value="Enter"/>
        </form>
        <?php
        include ('dbconn.php');
         session_start();
        
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
        echo "<br>";
        include "wordlist.php";
        $rnd_word_num = array_rand($wordlist);
        $word = $wordlist[$rnd_word_num]; // the current word which is searched for
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
                $emptytable= mysql_query("DELETE FROM `addletter`");
                if($emptytable !== FALSE)
                    {
                        echo("All rows have been deleted.");
                    }
                else
                    {
                    echo("No rows have been deleted.");
                    }
                }
        }
        echo "<br>";
        echo $attempts;

        ?>
</body>
</html>