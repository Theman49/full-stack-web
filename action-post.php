<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>
     <?
        if(isset($_POST['submitButton']) && $_POST['firstname'] != "") {

            echo "your first name is : ".$_POST['firstname'];
        } else {
            echo "there is null firstname";
        }

        echo "<br><br>normal message : ".$_POST['message'];
        echo "<hr>nl2br message : <br>".nl2br($_POST['message']);
     ?>
</body>
</html>