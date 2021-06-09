<?php include 'ext.php'?>
<?php include 'header.php'?>
<?php $_SESSION['historySearch']=""; ?>
<div class="breadcrumb-box">
        <ul class="breadcrumbs">
            <li class="breadcrumb-item">
                <a href="startpage.php" class="crumb">home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="playlists.php" class="crumb">playlists</a>
            </li>
        </ul>
</div>
<body class="backgroundBlue">
        <div class="page-title-box">
            <h2 class="page-title-text">Playlists</h2>
        </div>
        <div id="playlist-search-box">
            <form action="playlists.php" method="POST">
                <label class="playlist-search-label" for="sortby">Sort by:</label>
                <input class="playlist-search-input" type="text" name="searchlist" value="<?php 
                if (isset($_POST['searchlist'])){ 
                    echo $_POST['searchlist'];
                    }else{
                        echo "";
                    }
                    ?>">
                <button type="submit" class="button-style-black">Apply</button>
            </form>
        </div>
<div class="playlists-result">
<?php
           error_reporting(E_ALL);
           ini_set('display_errors', 'on');

           if(empty($_POST['searchlist'])){
           $playlistquery = "SELECT * FROM UserPlaylist JOIN Users ON Users.userID = UserPlaylist.userID JOIN Playlists ON Playlists.PlaylistID = UserPlaylist.PlaylistID";
           $result = mysqli_query($db, $playlistquery);
           }

           else {
            $arg = mysqli_real_escape_string($db, $_POST['searchlist']);
            $playlistquery = "SELECT * FROM UserPlaylist JOIN Users ON Users.userID = UserPlaylist.userID JOIN Playlists ON Playlists.PlaylistID = UserPlaylist.PlaylistID WHERE Playlists.Title = '$arg' OR Users.Username = '$arg'";
            $result = mysqli_query($db, $playlistquery);

           }

        ?>

        <?php
            while($rows = mysqli_fetch_assoc($result)){
        ?>

            <div class="playlist">
                <div class="playlist-img"><a href="browseplaylist.php"><?php echo '<img src="data:image/jpeg;base64,'.( $rows['Cover'] ).'"/>'; ?></div>
                <div class="playlist-info">
                    <h4 class="playlist-name"><?php echo $rows['Title']; ?></h4>
                    <p class="playlist-username"><?php echo $rows['Username']; ?></p></a>
                </div>
            </div>

        <?php } ?>
       
</div>
    <?php include 'footer.php';?>
</body>