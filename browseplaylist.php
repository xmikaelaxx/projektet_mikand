<?php include 'ext.php'?>
<?php include 'header.php'?>

<?php $_SESSION['historySearch']=""; ?>
<?php 

$userID = $_SESSION['userID'];
$playlistID = 1; //explode('?', $_SERVER['REQUEST_URI']);
//$playlistID = end($playlistID);


  $getPlaylistQuery = "SELECT * FROM PlaylistSongs JOIN Songs ON Songs.SongID = PlaylistSongs.SongID 
  JOIN Playlists ON Playlists.PlaylistID = PlaylistSongs.PlaylistID WHERE Playlists.PlaylistID = $playlistID";
  $getPlaylist = mysqli_query($db, $getPlaylistQuery);

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

<?php 

echo "<div class='table'>";
echo "<table id='fjomp'>";
echo "<tr class ='createTableRow'><th class ='createTableTitles'>Artist</th><th class ='createTableTitles'>Title</th><th class ='createTableTitles'>Duration</th>";

while($rows = mysqli_fetch_assoc($getPlaylist)){
  $artist = $rows['Artist'];
  $title = $rows['Title'];
  $duration = $rows['Duration'];

      echo "<tr>";
      echo "<td> $artist </td>";
      echo "<td> $title </td>";
      echo "<td> $duration </td>";
      echo "</tr>";

 } 

echo "</table>";
echo "</div>";


?>

<h2 class='specificPlaylistTitle'><?php echo $title ?></h2>;






<?php include 'footer.php' ?>
</body>
</html>
