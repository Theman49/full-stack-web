<?php
    echo "<h1>mysqli_connect(\$host, \$username, \$password, \$database_name)</h1>";
    echo "<h3>\$host host you are connecting</h3>";
    echo "<h3>\$username is the the username we made when creating db</h3>";
    echo "<h3>\$password is the the password we made when creating db</h3>";
    echo "<h3>\$database_name is the the database_name we created</h3>";
    
    //connection 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "TCWD";

    $conn = mysqli_connect($server, $username, $password, $database);

    if(!$conn){
        $msg = "Couldn't connect to database. <br>";
        $msg .= "Error Number: " . mysqli_connect_errno(). "<br>";
        $msg .= "Error: " . mysqli_connect_error();
        die($msg);
    }

    echo "You are connected to your database ";
    echo mysqli_get_host_info($conn);

    // mysqli_close($conn);

    # mysqli_query
    echo "<hr>";
    echo "<h1>mysqli_query(\$link, \$query)</h1>";
    echo "<h3>\$link is the link to the database, use variable assigned to mysqli_connect()</h3>";
    echo "<h3>\$query is the string we want to query</h3>";

    // $query = "INSERT INTO users values(NULL,'query3@tcwd.com','Testname3','Testlast3','fakepass3')";
    // $sql = mysqli_query($conn, $query);

    // if(!$sql){
    //     die("Query Gagal, ". mysqli_error($conn));
    // }
    // echo "Berhasil insert to database";

    # mysqli_real_escape_string()
    echo "<hr>";
    echo "<h1>mysqli_real_escape_string(\$link, \$escapeString)</h1>";
    echo "<h3>\$link is the link to the database, use variable assigned to mysqli_connect()</h3>";
    echo "<h3>\$escapeString is the string we want to query</h3>";

    $text = 'this is the "problem"';
    echo $text."<br>";
    $textEsc = mysqli_real_escape_string($conn, $text);
    echo $textEsc." with mysqli_real_escape_string()<br>";

    function cleanMySQL($connection, $input){
        return mysqli_real_escape_string($connection, $input);
    }

    $str = 'This is the "Problem" to with function';
    echo cleanMySQL($conn, $str);

    # unescaping 
    echo "<hr>";
    echo "<h1>stripslashes(\$str)</h1>";
    echo "<h3>\$str is the string to remove extra slashes from</h3>";

    echo $textEsc."<br>";
    echo stripslashes($textEsc);

    # displaying information from database
    echo "<hr>";
    echo "<h1>mysqli_fetch_array(\$result)</h1>";
    echo "<h3>\$sresult is the connecting variable</h3>";

    $query = "SELECT * FROM users";
    $info = mysqli_query($conn, $query);
    $no = 0;
    while($var = mysqli_fetch_array($info)) {
        $no++;
        echo $no.". ".$var['email']."<br>";
    }
    // query WHERE
    $queryWhere = "SELECT * FROM users WHERE UID=$no-2";
    $info = mysqli_query($conn, $queryWhere);
    $user_info = mysqli_fetch_array($info);
    echo $user_info['UID'].". ".$user_info['Firstname'];

    // query WHERE AND OR
    $queryWhere = "SELECT * FROM users WHERE Firstname='Testname' AND Lastname='Testlast'";
    $query1 = mysqli_query($conn, $queryWhere);
    $queryWhere = "SELECT * FROM users WHERE Firstname='Testname' OR Lastname='Testlast2'";
    $query2 = mysqli_query($conn, $queryWhere);
    $queryWhere = "SELECT * FROM users WHERE UID>0";
    $query3 = mysqli_query($conn, $queryWhere);
    $queryWhere = "SELECT * FROM users WHERE UID>0 LIMIT 2";
    $query4 = mysqli_query($conn, $queryWhere);

    echo "<hr>";
    echo "<h1>mysqli_num_rows(\$result)</h1>";
    echo "<h3>\$sresult is the connecting variable to our query</h3>";
    echo "<br>WHERE Firstname='Testname' AND Lastname='Testlast' &rarr;".mysqli_num_rows($query1);
    echo "<br>WHERE Firstname='Testname' OR Lastname='Testlast2' &rarr;".mysqli_num_rows($query2);
    echo "<br>WHERE UID>0 &rarr;".mysqli_num_rows($query3);
    echo "<br>WHERE UID>0 LIMIT 2 &rarr;".mysqli_num_rows($query4);
    echo "<br>";
    $query = "SELECT * FROM users WHERE UID>0 ORDER BY UID DESC LIMIT 2";
    $info = mysqli_query($conn, $query);
    while($var = mysqli_fetch_array($info)) {
        echo $var['UID'].". ".$var['email']."<br>";
    }

    # update data in database
    $query = "SELECT * FROM users WHERE UID=2";
    $result = mysqli_query($conn, $query);
    $info = mysqli_fetch_array($result);
    echo "<hr>Before : <br>Firstname = ".$info['Firstname']. " and Lastname = ". $info['Lastname'];
    $update = "UPDATE users SET Firstname='Andi', Lastname='Rahman' WHERE UID=".$info['UID'];
    mysqli_query($conn, $update);

    $query = "SELECT * FROM users WHERE UID=2";
    $result = mysqli_query($conn, $query);
    $info = mysqli_fetch_array($result);
    echo "<br>After : <br>Firstname = ".$info['Firstname']. " and Lastname = ". $info['Lastname']."<hr>";

    # delete data in database
    // $insert = mysqli_query($conn, "INSERT INTO users VALUES(NULL,'me@website.com','John','Doe','testPassword')") or die(mysqli_error($conn));

    $select = mysqli_query($conn, "SELECT * FROM users ORDER BY UID DESC LIMIT 1") or die(mysqli_error($conn));

    $info = mysqli_fetch_array($select);
    foreach($info as $key => $value){
        if(is_numeric($key)){
            continue;
        }
        echo $key. ": ". $value."<br>";
    }
    
    // $delete = mysqli_query($conn, "DELETE FROM users WHERE UID=".$info['UID']) or die(mysqli_error($conn));
    // cek the row was delete
    $select = mysqli_query($conn, "SELECT * FROM users WHERE UID=".$info['UID']) or die(mysqli_error($conn));

    echo $info['Firstname']." found: ".mysqli_num_rows($select);
?>