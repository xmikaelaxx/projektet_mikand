<?php include 'ext.php'?>
<?php include 'header.php'?>

<?php $_SESSION['historySearch']=""; ?>
<?php 

$userID = $_SESSION['userID'];
$playlistID = 32; //explode('?', $_SERVER['REQUEST_URI']);
//$playlistID = end($playlistID);


  $getPlaylistQuery = "SELECT * FROM PlaylistSongs JOIN Songs ON Songs.SongID = PlaylistSongs.SongID 
  JOIN Playlists ON Playlists.PlaylistID = UserPlaylist.PlaylistID WHERE Playlists.PlaylistID = $playlistID";
  $getPlaylist = mysqli_query($db, $getPlaylistQuery);
  $rows = mysqli_fetch_assoc($getPlaylist);
  $songID = $rows['SongID'];
  $username = $rows ['Username'];
  echo $username;


?>

<!DOCTYPE html>
<body class ="backgroundBlue"> 


<!--<div class="breadcrumb-box">
        <ul class="breadcrumbs">
            <li class="breadcrumb-item">
                <a href="startpage.php" class="crumb">home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="browseplaylist.php" class="crumb">php variabeln hallå</a>
            </li>
        </ul>
    </div>-->

<h2 class="specificPlaylistTitle">php variable playlist title</h2>
<h3 class="specificPlaylistUsername">by<?php echo $username ?> </h3>
<?php showResults();?>

<?php
function showResults() {

  //for ($i = 0; $i < 150; $i++){

    
  //}
        //echo "<div class ='table'>";
        //echo "<table id='fjomp'>";
        //echo "<tr class ='createTableRow'>";
        //echo "<th class ='createTableTitles'></th>";
        //echo "<th class ='createTableTitles'>Artist</th>";
        //echo "<th class ='createTableTitles'>Title</th>";
        //echo "<th class ='createTableTitles'>Album</th>";
        //echo "<th class ='createTableTitles'>Duration</th>";
        //echo "</tr>";
        //echo "<td><form id='formSearch' method='POST' enctype='text'><input class='addTrack' type='submit' value ='love' name='addTrack_$i' id='addTrack_$i'></input></form></td>";
        //echo "<td>" . $data[$i]['artist']['name'] . "</td>";
        //echo "<td>" . $data[$i]['title'] . "</td>";
        //echo "<td>" . $data[$i]['album']['title'] . "</td>";
        //echo "<td>" . gmdate("i:s", $data[$i]['duration']) . "</td>";
        //echo "</tr>";
      }
    
      //echo "</table>";
      //echo "</div>";
      //echo "</div>";

  

  
  ?>


<?php include 'footer.php' ?>
</body>
</html>