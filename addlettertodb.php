<?php
        include ('dbconn.php');
        echo $_POST['letter'];
        $newletter = $_POST['letterinput'];
        $insert = "INSERT INTO addletter (letter) VALUES ('$newletter')";
       
        if($con->query($insert) === TRUE){
            header("Location: test.php?status=letter_success");
          }
        
?>