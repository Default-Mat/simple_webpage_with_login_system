<?php 
    session_start();
    session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="signupcss.css" rel="stylesheet">
    <title>Sign in</title>
</head>
<body>
    <div class="box">
        <h1>Sign in</h1><br>
        <div class="input-box">
            <form action="signin.php" method="post">
                <input class="inputs" type="text" name="uname" placeholder="Username" required><br>
                <input class="inputs" type="password" name="pword" placeholder="Password" required><br>
                <input id="btn" type="submit" name="insert" value="Submit">
            </form>
        </div>
        <a href="signup.php">Don't have an account? click here</a>
    </div>

    <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $databaseName = "sample";
        if(isset($_POST['uname']) && isset($_POST['pword'])){
            $uname = $_POST['uname'];
            $pword = hash("haval160,4", $_POST['pword']);
            try{
                $connect = new PDO("mysql:host=$hostname;dbname=$databaseName", $username, $password);
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = "SELECT * FROM useracc WHERE username = '$uname' AND password = '$pword'";
                $select = $connect->query($query);
                if($select->fetchColumn() == 0){
                    echo "Username or Password is incorrect";
                }
                else{
                    $_SESSION['username'] = $_POST['uname'];
                    header("Location:main.php");
                    exit();
                }
            }
            catch(PDOException $e){
                echo $query + "<br>" + $e->getMessage();
            }
            $connect = null;
        }
    ?>
</body>
</html>