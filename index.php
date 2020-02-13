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
        <img src="images/1.png" alt="hangman" class="activeimage"/>
        <img src="images/2.png" alt="hangman"/>
        <img src="images/3.png" alt="hangman"/>
        <img src="images/4.png" alt="hangman"/>
        <img src="images/5.png" alt="hangman"/>
        <img src="images/6.png" alt="hangman"/>
        <img src="images/7.png" alt="hangman"/>
        <img src="images/8.png" alt="hangman"/>
    </div>
    <div class="wordpanel">
        <?php include ('showword.php');?>
    </div>
    <div class="inputpanel">
        <form action="addlettertodb.php" method = "POST" class="forminput">
            <input type="text" maxlength="1" id="letterinput" name="letterinput" onfocus="this.value=''" value="Enter a letter...">
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