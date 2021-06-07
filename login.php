<?php include 'ext.php'?>
<?php include 'header.php'?>

<body class ="backgroundBlue"> 
        <div class="page-title-box">
            <h2 class="page-title-text">Already a user?</h2>
        </div>
        <div id="login-container">
        <form action="login.php" method="POST">
            <div id="login-box">
                <label for="username"></label>
                <input type="text" placeholder="Username..." name="Username">

                <label for="password"></label>
                <input type="password" placeholder="Password..." name="Password">
            </div>
            <div id="login-box-button">
                <button class="button-style-black" type="submit">Login</button>
            </div>
        </form>
        <div id="sign-up-box">
            <h3 id="sign-up-text">Not a user?</h3>
            <button class="button-style-black">Sign up!</button>
        </div>
    </div>

    <?php

    if(isset($_POST['endsession'])){
        session_destroy();
        header('refresh:0');
    }

    if(isset($_POST['Username']) && isset($_POST['Password'])){
        $username = $_POST['Username'];
        $password = $_POST['Password'];

        $query = "SELECT * FROM Users WHERE Username = ? AND Password = ?";

        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->bind_result($userID, $usrname, $pw, $email, $firstname, $lastname);
        $stmt->execute();

        if($stmt->fetch()){
            $_SESSION['Username'] = $usrname;
            $_SESSION['Password'] = $pw;
        }

        if(isset($_SESSION['Username'])){
            echo $_SESSION['Username'];
            echo $_SESSION['Password'];
        }

        if($_SESSION['Password'] == 'mikaela'){
            header('Location:http://192.168.64.2/projektet_mikand/profile.php');
    
        }
        else{
            echo "WRONG";
        }
    

        $stmt->close();
    }
    ?>

    <?php include 'footer.php' ?>
</body>
