<?php include 'ext.php'?>
<?php include 'header.php'?>
<?php $_SESSION['historySearch']=""; ?>

<body>
<div class="breadcrumb-box">
        <ul class="breadcrumbs">
            <li class="breadcrumb-item">
                <a href="startpage.php" class="crumb">home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="profile.php" class="crumb">profile</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#" class="crumb">my playlists</a>
            </li>
        </ul>
</div>
        <div class="page-title-box">
            <h2 class="page-title-text">My playlists</h2>
        </div>


        <!-- DETTA ÄR NYTT -->
        <div class="playlists-result">
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 'on');
        $userID = $_SESSION['userID'];

            $playlistquery = "SELECT * FROM UserPlaylist JOIN Users ON Users.userID = UserPlaylist.userID JOIN Playlists ON Playlists.PlaylistID = UserPlaylist.PlaylistID WHERE Users.userID = $userID";
            $result = mysqli_query($db, $playlistquery);

        ?>

        <?php
            while($rows = mysqli_fetch_assoc($result)){
        ?>
        

            <div class="playlist">
                <div class="playlist-img"><a href="browseplaylist.php"><?php echo '<img src="data:image/jpeg;base64,'.( $rows['Cover'] ).'"/>'; ?></div>
                <div class="playlist-info-blue">
                    <h4 class="playlist-name"><?php echo $rows['Title']; ?></h4>
                    <p class="playlist-username"><?php echo $rows['Username']; ?></p></a>
                </div>
            </div>

        <?php } ?>

        </div>
    <?php include 'footer.php';?>
</body>