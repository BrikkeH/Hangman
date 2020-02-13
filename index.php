<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="stylesheet.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lacquer|Poppins&display=swap" rel="stylesheet">
    <title>Hangman</title>
</head>
<body>
    <h1>Hangman</h1>
    <div class="images">
        <?php include ('imageupdate.php');?>
        <img src="<?php echo $image; ?>" alt="hangman" class="activeimage"/>
    </div>
    <div class="wordpanel">
        <?php include ('showword.php');?>
    </div>
    <div class="inputpanel">
        <form action="addlettertodb.php" method = "POST" class="forminput">
            <input type="text" maxlength="1" id="letterinput" name="letterinput" onfocus="this.value=''" required pattern="\S+.*">
            <input name="enter" type="submit" value="Enter"/>
        </form>
    </div>
    <div class="mistakes">
            <div class="column1">
                <h2>Wrong letters:</h2>
            </div>
            <div class="column2">
                <?php include ('showwrongletters.php')?>
            </div>
    </div>
</body>
</html>