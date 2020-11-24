<?php
    # setcookie
    // setcookie("TCWD", "We are making a cookies!", time() + 60*0.5);
    # destroy cookie
    // setcookie("TCWD", "", time()-3600);

    // echo session_status()."<br>";
    if(!isset($_SESSION)){
        session_start();
    }
    // $_SESSION['Course'] = "The fullstack web developer";
    // echo session_status()."<br>";

    $pass = urldecode($_GET['p']); //password from variable in url
    if($pass == "TCWD"){
        $_SESSION['Pass_Correct'] = 1; // true
    }

    if(isset($_SESSION['Pass_Correct'])){
        echo "You entered a correct password";
        // session_destroy(); // destroy everything session
    } else {
        echo "who are you??!!!";
    }

    # session_destroy() or unset($_SESSION[]) --> for logut sistem
    // $_SESSION['a'] = "alfred";
    // $_SESSION['b'] = "bunny";
    // foreach($_SESSION as $s => $val){  //
    //     unset($_SESSION[$s]);          //   this is same with session_destroy()
    // }                                  //
    // foreach($_SESSION as $s){
    //     echo $_SESSION[$s];     // display nothing, because the session was destroyed
    // }

    // $_SESSION['a'] = "alfred";
    // $_SESSION['b'] = "bunny";

    // unset($_SESSION['a']);
    // foreach($_SESSION as $s => $val){
    //     echo "<br>".$_SESSION[$s]; 
    // }


    if(!isset($_SESSION['Count'])){
        $_SESSION['Count'] = 0;
    }
    echo "<br>You have refreshed the page ". $_SESSION['Count']. " times";
    $_SESSION['Count']++;

    echo '<h1>server super global variable</h1>';
    $doc_root = $_SERVER['DOCUMENT_ROOT'];
    echo "<br>DOCUMENT_ROOT     :".$doc_root;
    $gate_interface = $_SERVER['GATEWAY_INTERFACE'];
    echo "<br>GATEWAY_INTERFACE :". $gate_interface;
    $http_host = $_SERVER["HTTP_HOST"];
    echo '<br>HTTP_HOST       : '. $http_host;
    echo '<br>HTTP_REFERER    : '.$_SERVER['HTTP_REFERER'];
    echo '<br>HTTP_USER_AGENT : '.$_SERVER['HTTP_USER_AGENT'];
    echo '<br>REMOTE_ADDRESS  : '.$_SERVER['REMOTE_ADDRESS'];
    echo '<br>REMOTE_PORT     : '.$_SERVER['REMOTE_PORT'];
    echo '<br>REQUEST_METHOD  : '.$_SERVER['REQUEST_METHOD'];
    echo '<br>REQUEST_URI     : '.$_SERVER['REQUEST_URI'];
    echo '<br>SCRIPT_FILENAME : '.$_SERVER['SCRIPT_FILENAME'];
    echo '<br>SCRIPT_NAME     : '.$_SERVER['SCRIPT_NAME'];
    echo '<br>PHP_SELF        : '.$_SERVER['PHP_SELF'];
    echo '<br>QUERY_STRING    : '.$_SERVER['QUERY_STRING'];

    echo '<h1>Cookies</h1>';
    echo '<h3>setcookie($name, $value, $expires, $domain, $secure, $httponly)</h3>';
    echo '<h3>setcookie() must be set before all output such as html and whitespace</h3>';
    // echo $_COOKIE['TCWD'];
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form method="POST" action="upload.php" enctype="multipart/form-data">
        <h1>Upload File with super global variable $_FILES[]</h1>
        <input type="file" name="uploadedFile">
        <input type="submit" name="submitButton" value="Upload File">
    </form>
</body>
</html>

<?php
    echo "<h1>Sending Email</h1>";
    echo '<h3>mail($to, $subject, $message, $additional_headers, $additional_params)</h3>';
    echo '<h3>wordwrap($string, opt int $width = 75, opt str $break ="\n", opt bool $cut = false)</h3>';

    $to = "49lukmandeny@gmail.com";
    $subject = "Test Subject PHP email advanced";
    $msg = "<b>Short Message from my pc</b>";

    // to send HTML mail, we need to set MIME Version and
    // set the Content-type to text/html
    $headers = "MIME-Version : 1.0" . "\r\n";
    $headers .= "Content-type : text/html; charset=iso-8859-1" . "\r\n";

    // More headers we can use
    $headers .= 'To: John <john@example.com>, Jane <jane@example.com>' . "\r\n";
    $headers .= "From: That Kalob Guy <stranger@example.com>" . "\r\n";
    $headers .= "Cc: carboncopy@example.com" . "\r\n";
    $headers .= "Bcc: blindcarboncopy@example.com" . "\r\n";
    $headers .= "Reply-To: kalob@example.com" . "\r\n";

    $addParams = "-fwebmaster@anything.com"; // -f --> to not email this people and diplay the server that the email came from
    // mail($to, $subject, $msg, $headers, $addParams);
    mail($to, $subject, $msg);

    # file systems and managements
    echo "<h1>File systems and managements</h1>";
    echo '<h3>fopen($filename, $action);</h3><i>when use fopen() it must assign into a variable</i>';
    echo '<br><i>action : "w" for write, "r" for read, "a" for append</i>';
    echo "<h3>or die(\"message\")</h3>";
    echo "<h3>fclose(\$fileHandler)</h3>";
    echo "<h1>writing to existing files</h1>";
    echo "<h3>fwrite(\$handler, \$string, opt \$length)</h3>";
    $fileHandler = fopen("createdFile.txt", "w") or die("Couldn't create file"); // action: w is for write
    $string = "<b>files</b>";
    fwrite($fileHandler, "I can create and write " . $string . " in PHP now");
    fwrite($fileHandler, "<br>and this is the second line");
    fclose($fileHandler);

    include "createdFile.txt";

    echo "<h1>Read file contents</h1>";
    echo "<h3>fread(\$handler, \$length)</h3>";
    $fileHandler = fopen("file_README.txt", "w");
    fwrite($fileHandler, "This is the file to read <br>");
    fclose($fileHandler);

    $fileRead = fopen("file_README.txt", "r");
    $contents = fread($fileRead, 50);
    fclose($fileRead);
    echo $contents;

    // $file = "file_README.txt";
    // $fileRead = fopen($file, "r");
    // $contents = fread($fileRead, filesize($file)); //in bytes
    // fclose($fileRead);

    // echo "File name: ".$file . "<br>";
    // echo "File size: " . filesize($file) . "<br>";
    // echo "Contents: " . $contents. "<br>";

    // append information
    $fileHandler = fopen("file_README.txt", "a");
    fwrite($fileHandler, "\n this is second line");
    $third = "\n third line";
    fwrite($fileHandler, $third);
    fclose($fileHandler);

    $file = "file_README.txt";
    $fileRead = fopen($file, "r");
    $contents = fread($fileRead, filesize($file)); //in bytes
    fclose($fileRead);

    echo "File name: ".$file . "<br>";
    echo "File size: " . filesize($file) . "<br>";
    echo "Contents: " . nl2br($contents). "<br>";

    // deleting file
    echo "<h1>unlink(\$filename)</h1>";

    $fileHandler = fopen("file_delete.txt", "w");
    fwrite($fileHandler, "Delete this file");
    fclose($fileHandler);

    echo "Before : ";
    include "file_delete.txt";

    unlink("./file_delete.txt");
    echo "<br>after : ";
    include "file_delete.txt";
?>