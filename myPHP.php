<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my PHP</title>
</head>
<body>
    <?="this is echo shorthand &rarr;". htmlentities("<?=\"string\";?>") . "<br>";?>

    <!-- <?php
        $string = "The Complete Web Developer";
        echo $string."<br>";
        $replace = str_replace("The", "<b>I am</b>", $string);
        echo $replace;

        # or

        echo "<br>".str_ireplace("complete", "<b>Best</b>", $string);

        $string2 = "My name is Kalob";
        echo "<br>Your instructor name is ".substr($string2, 11, 5);
        $string3 = "<br> no capitals in here";
        echo ucwords($string3);
        echo strtoupper($string3);
        echo "<br>";
        echo strtolower($string2);
        echo "<br>";
        $element = htmlentities("<font>");
        echo "Element is &rarr; ". $element  . "<br>";

        #array and numeric array
        $arr = array("Bob", "Tom", "Zain");
        echo $arr[0]. "<br>";

        # Asociative Array
        $cars = array("Deny" => "Ford", "Richman" => "Bentley");
        echo "Deny car is " . $cars["Deny"] . "<br>";

        # Multidimensional Array
        $multiArray = array(
            "names" => array(
                    "Bob", "Tom", "Tim"
            ),
            "ages" => array(
                    13,14,15
            )
        );
        echo $multiArray["names"][2] . " is " . $multiArray["ages"][2] . " years old";

        # exploding()
        $str = "<hr>I have a cute cat";
        // exploded($delimiter,$string,$limit) its like split() in JS
        $exploded = explode(" ", $str, 4);
        foreach($exploded as $e){
            echo $e. "<br>";
        }

        # imploding()
        // i use array $arr from above;
        $imploded = implode(",", $arr);
        echo "Their names are : ". $imploded. "<hr>";

        // if(1>5){
        //     echo "wrong";
        // } else if(1<5){      // can be elseif too
        //     echo "right";
        // } else {
        //     echo "same";
        // }
        
        # foreach
        $motorArray = array("Suzuki", "Yamha", "Honda");
        foreach($motorArray as $motor){
            echo $motor. "<br>";
        }
        foreach($cars as $key => $value){
            echo "Key: ". $key . "&rarr;".$value."<br>";
        }


        # is_array
        $People = array("joe", "jon", "family" => array("bob", "sula"));
        foreach($People as $name){
            if(is_array($name)){
                continue;
            }
            echo $name. " ";
        }
        echo "<br>";

        if(is_array($People)){
            echo '$People is array<br>';
        }
        if(is_array($str)){
            echo '$str is array';
        } else {
            echo '$str isn\'t array';
        }
        # !!!!!! important !!!!!!
        // "quotes" --> interchangable
        // 'aposthrope' --> isnt interchangable
        echo "$str<br>";
        echo '$str';
        echo "<hr>";

        # include and require
        echo "I am taking $course"; // will error because in this page doesnt exist $course
        include "Include_Me.php";
        echo "I am taking $course <hr>"; // will get $course from Include_Me.php

        # function
        function favCar(){
            // echo "Ford Mustang";
            return "Ford Mustang";
        }
        // echo "I really like ";
        // favCar();
        echo "I really like ". favCar() . "<br>";

        function favFilm($film){
            echo "My favorite film is ". $film;
        }
        $myFavFilm = "Kimi No Nawa";
        favFilm($myFavFilm);

        echo "<hr>";

        #defining constant
        define("constant_name", "constant_value");
        const CONSTANT_NAME = "CONSTANT_VALUE";
        echo constant_name. "<br>". CONSTANT_NAME . "<hr>";

        # checking if them exist -    -     -    -
        // isset()
        $planet = "Earth";
        $animal = NULL;
        
        if(isset($planet)){
            echo '$planet is set';
        } else {
            echo '$planet is <b>not</b> set';
        }
        echo "<br>";

        if(isset($animal)){
            echo '$animal is set';
        } else {
            echo '$animal is <b>not</b> set';
        }
        echo "<br>";

        //unset() -> to destroy the existed variable
        $color = "orange";
        unset($color);
        if(isset($color)){
            echo '$color is set';
        } else {
            echo '$color is <b>not</b> set';
        }
        echo "<br>";

        // defined()
        const _planet_ = "Earth";
        define("_animal_", "cat");
        
        if(defined("_planet_")){
            echo '_planet_ is set';
        } else {
            echo '_planet_ is <b>not</b> set';
        }
        echo "<br>";

        if(defined("_animal_")){
            echo '_animal_ is set';
        } else {
            echo '_animal_ is <b>not</b> set';
        }
        echo "<br>";

        // function_exists()
        function something(){
            // nothing in here, but still exists
        }

        if(function_exists("something")){
            echo "something() exist!, this return true";
        } if(function_exists("something2")){
            echo "something2() does not exists &rarr; false";
        }
        echo "<br>";
        // is not set --> !isset()
        if(!isset($nani)){
            echo '$nani does <b>not</b> exists';
        }
    ?> -->


        <form method="GET" action="./action-get.php">
            <h1>method : GET</h1>
            <label for="firstname">Firstname : </label>
            <input type="text" name="firstname"><br>
            <button type="submit">Submit Firstname</button>
        </form>

        <form method="POST" action="./action-post.php">
            <h1>method : POST</h1>
            <label for="firstname">Firstname : </label>
            <input type="text" name="firstname"><br>
            <label for="lastname">Lastname : </label>
            <input type="text" name="lastname"><br>
            <button type="submit" name="submitButton">Submit Firstname</button>
        </form>

        <!-- 
            GET -> $_GET['variable'];
            POST -> $_POST['variable'];
            REQUEST -> $_REQUEST['variable'];
         -->
        <?php
            #URL encoding

            // urlencode($str) and urldecode($str)
            echo '<h1>urlencode($str) and urldecode($str)</h1>';
            $var = "A!bunch@of*characters$&%*#()";
            $encoded = urlencode($var);
            echo $encoded . "<br>";
            $decoded = urldecode($encoded);
            echo $decoded. "<br>";


            # new line break --> nl2br($str)
            echo '<h1>new line break --> nl2br($str)</h1>';
            $myStr = "The\n fullstack\n web developer";
            echo nl2br($myStr);
        ?>
        <form method="POST" action="action-post.php">
            <h1>nl2br text area</h1>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="write  in here"></textarea><br>
            <button type="submit">submit</button>
        </form>

        <?php
            // echo time();
            $now = time();
            echo date("F j, Y, g:i:s A", $now);

            // make timestamp --> mktime($hour,$minute,$second,$month,$day,$year) --> give unix timestamp
            echo "<br/>". mktime(14,52,30,7,27,2001). "<br>";
            $myBornDate = mktime(0,0,0,7,27,2001); // + 60*60*48;
            echo date("M d Y", $myBornDate);

            # ternary if else
            echo '<h1>ternary if else</h1>';
            echo '<h2>(condition ? "this will return true" : "this will return false");</h2>';
            $number = 419;
            $check = ($number == 49 ? "number is fourty nine" : "number is <b>not</b> fourty nine");
            echo $check."<br>"; //if tight will return true, if not will return false

            $person = "Budy";
            $who = "Hy, " . ($person == "Budy" ? $person : "Other Person");
            echo $who."<br>";
            $day = date("D");
            echo "it is " . ($day == "Saturday" || $day == "Sunday" ? "weekend" : "weekday");
        ?>
</body>
</html>