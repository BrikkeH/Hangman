<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        $sqldel = "DELETE FROM `addletter`";
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
        if(isset($_POST['reset']))
        {  
            if(mysqli_query($con, $sqldel)){
                echo "Records were deleted successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
            session_destroy();
            exit;
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
                if(mysqli_query($con, $sqldel)){
                    echo "Records were deleted successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                session_destroy();
                exit;
        }
    }
        echo "<br>";
        echo $attempts;
        ?>
</body>
</html>