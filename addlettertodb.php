<?php
        include ('dbconn.php');
        $newletter = $_POST['letterinput'];

        $insert = "INSERT INTO addletter (letter) VALUES ('$newletter')";
        if($con->query($insert) === TRUE){
            echo "inserted";
          }
?>