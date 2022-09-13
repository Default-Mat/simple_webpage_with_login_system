<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <link href="formStyle.css" rel="stylesheet">
        <script>
            function validate(){
                var pass = document.getElementById("pass");
                var rpass = document.getElementById("rpass");
                if(pass.value == rpass.value){
                    return true;
                }
                else{
                    alert("The repeated password is not the same");
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <div class="box">
            <h1>Sign up</h1>
            <div class="input-box">
                <form onsubmit="return validate()" action="signup.php" method="post">
                    <input class="inputs" type="text" name="username" placeholder="Username" required><br>
                    <input class="inputs" id="pass" type="password" name="password" placeholder="Password" required><br>
                    <input class="inputs" id="rpass" type="password" name="Rpassword" placeholder="Repeat Password" required><br>
                    <input id="btn" type="submit" name="insert" value="Submit">
                </form>
            </div>
        </div>
        <?php
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $databaseName = "sample";
            if(isset($_POST['insert'])){
                $uname = $_POST['username'];
                $pword = hash("haval160,4", $_POST['password']);
                try{
                    $connect = new PDO("mysql:host=$hostname;dbname=$databaseName", $username, $password);
                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query = "SELECT username FROM useracc WHERE username = '$uname'";
                    $select = $connect->query($query);
                    if($select->fetchColumn() == 0){
                        $insert = "INSERT INTO useracc(username, password) VALUES('$uname', '$pword')";
                        $connect->exec($insert);
                        header("Location:signin.php");
                        exit();
                    }
                    else{
                        echo "This username is already in use";
                    }
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }
                $connect = null;
            }
        ?>
    </body>
</html>