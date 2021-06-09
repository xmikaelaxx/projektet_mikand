<?php include 'ext.php'?>
<?php include 'header.php'?>
<!DOCTYPE html>

<?php $_SESSION['historySearch']=""; ?>

<h2>Give your playlist a name</h2>

<div class="breadcrumb-box">
        <ul class="breadcrumbs">
            <li class="breadcrumb-item">
                <a href="startpage.php" class="crumb">home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="profile.php" class="crumb">profile</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#" class="crumb">create</a>
            </li>
        </ul>
</div>

<div class="startplaylistName">
    <form action="" method="POST" enctype="multipart/form-data">
        <input class="searchBar2" type="text" name="playlistTitle"></input><br>
        <label class="label-fileUpload" for="coverUpload">Upload cover</label><br>
        <input class="fileUpload" type="file" name="coverUpload"><br>
        <button class="buttonSubmit" type="submit" name="submit">NEXT</button>
    </form>
</div>


            <!-- KOLLA PÅ DETTA, DETTA ÄR NYTT -->
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 'on');

    if(isset($_POST['submit'])){
        $name = $_POST['playlistTitle'];
        $image = $_FILES['coverUpload']['tmp_name'];
        $image = str_replace(' ','+',$image);
        $image = base64_encode(file_get_contents(addslashes($image)));

        $userID = $_SESSION['userID'];

        $insertCoverInDb = "INSERT INTO Playlists (userID, Title, Cover, Genre) VALUES ('$userID', '$name', '$image', '')";
        $result = mysqli_query($db, $insertCoverInDb);




        if($result){
            $getplaylistID = "SELECT * FROM Playlists WHERE Playlists.Title = '$name' AND Playlists.userID = '$userID'";
            $info = mysqli_query($db, $getplaylistID);
            $rows = mysqli_fetch_assoc($info);

            $playlistID = $rows['PlaylistID'];
            $userID = $_SESSION['userID'];

            $insertInUserPlaylist = "INSERT INTO UserPlaylist (userID, PlaylistID) VALUES ('$userID', '$playlistID')";
            $send = mysqli_query($db, $insertInUserPlaylist);

            header('Location:http://192.168.64.2/projektet_mikand/createplaylist.php?'. $playlistID);

        } else{

            echo "There is a problem..";
        }

    } else{

    }

    ?>
 



<?php include 'footer.php' ?>

</html>