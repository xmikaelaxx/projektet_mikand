<?php include 'ext.php'?>
<?php include 'header.php'?>

<body>
        <div class="page-title-box">
            <h2 class="page-title-text">Hello, <?php echo $_SESSION['Username']; ?> </h2>
        </div>
        <div id="profile-box">
            
            <a href=""> <div class="profile-content">
                <img class="profile-content-icon" src="img/tone.svg" alt="">
                <h4 class="profile-content-title">My playlists</h4>
            </div></a>
            <a href=""><div class="profile-content">
                <img class="profile-content-icon" src="img/liked.svg" alt="">
                <h4 class="profile-content-title">Liked</h4>
            </div></a> 
            <a href="settings.php"><div class="profile-content">
                <img class="profile-content-icon" src="img/settings.svg" alt="">
                <h4 class="profile-content-title">Settings</h4>
            </div></a>
            <a href="createplaylist.php"><div class="profile-content">
            <img class="profile-content-icon" src="img/add.svg" alt="">
                <h4 class="profile-content-title">Create playlists</h4>
            </div></a>
        </div> 
        <div class="logout-button-box">
            <form action="login.php" method="POST">
                <button class="buttons" type="submit" name="endsession">Bye!</button>
            </form>
        </div>     
    <?php include 'footer.php';?>


</body>