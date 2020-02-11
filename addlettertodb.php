<?php
        include ('dbconn.php');
        echo $_POST['letter'];
        $con->query("INSERT INTO `addletter`(`letter`) VALUES ([value-1])")
        
?>