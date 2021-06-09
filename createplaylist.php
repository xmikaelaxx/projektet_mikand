<?php include 'ext.php'?>
<?php include 'header.php'?>
<!DOCTYPE html>

<div class="breadcrumb-box">
        <ul class="breadcrumbs">
            <li class="breadcrumb-item">
                <a href="startpage.php" class="crumb">home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#" class="crumb">profile</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#" class="crumb">create</a>
            </li>
        </ul>
    </div>
<h2 class="specificPlaylistTitle">Create a playlist</h2>
<div class="createPlaylistSearch">
    <div class="startsearchDiv">
    <form id= "formSearch" onclick="showResults()" method="POST" enctype= "text">
                <input class="searchBar" type="text" name="searchBar" value="<?php 
                if (isset($_POST['searchBar'])){ 
                    echo $_POST['searchBar'];
                    }else{
                      if (isset ($_SESSION['historySearch'])){
                        echo $_SESSION['historySearch'];

                      }else{
                        echo "";
                      };
                    };
                    
                ?>">
                  <input class='buttons' type='submit' value='SEARCH' name='startButton'></form>
                </div>
</div>




<div class="displaySearchResults">
  <div class= "tablePlaylist">
  <?php 

if($_SERVER['REQUEST_METHOD'] != "POST"){ 
  $_SESSION['trackClickedArray'] = [];
};


for ($i = 0; $i < 150; $i++){
  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addTrack_' . $i])){
    array_push ($_SESSION['trackClickedArray'], $i); 
    identifyTrack($i);
  }
}

  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['startButton'])){
    $_SESSION['trackClickedArray'] = [];
    $_SESSION['historySearch'] = $_POST['searchBar'];
    showResults($_POST['searchBar']);
      
  }else{
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['searchBar'])){ 
      showResults($_POST['searchBar']);
      }else{
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset ($_SESSION['historySearch'])){  
          showResults($_SESSION['historySearch']);
        }else{
          echo "";
        };
      };

  }


  function showResults($mikaela) {
    //echo "<div style='color:white'> $trackClicked</div>";
    if ($mikaela==""){
      echo "<h3>You need to type in at least one character!</h3>";
    }else{
      $searchBarInput = str_replace(" ", "%20", $mikaela);
      $url = 'https://api.deezer.com/search?q=' . $searchBarInput . '&limit=150';
      $result = file_get_contents($url);
      $resultDecoded = (json_decode($result, true)); 
      $data = $resultDecoded['data'];
      $_SESSION["latestQueryResult"]= $data;
      echo "<div class ='table'>";
      echo "<table id='fjomp'>";
      echo "<tr class ='createTableRow'>";
      echo "<th class ='createTableTitles'></th>";
      echo "<th class ='createTableTitles'>Artist</th>";
      echo "<th class ='createTableTitles'>Title</th>";
      echo "<th class ='createTableTitles'>Album</th>";
      echo "<th class ='createTableTitles'>Duration</th>";
      echo "</tr>";
      for ($i = 0; $i < count($data)-1; $i++){
        echo "<tr class = 'createTableRow'>";
        $icon = "+";
        if (in_array($i, $_SESSION['trackClickedArray'])){
          $icon = "✓";
        }
        echo "<td><form id='formSearch' method='POST' enctype='text'><input class='addTrack' type='submit' value ='$icon' name='addTrack_$i' id='addTrack_$i'></input></form></td>";
        echo "<td>" . $data[$i]['artist']['name'] . "</td>";
        echo "<td>" . $data[$i]['title'] . "</td>";
        echo "<td>" . $data[$i]['album']['title'] . "</td>";
        echo "<td>" . gmdate("i:s", $data[$i]['duration']) . "</td>";
        echo "</tr>";
      }
    
      echo "</table>";
      echo "</div>";
      echo "</div>";

      echo "
      <div class='picklistDiv'>
          <h3 class='picklistTitle'>Pick a genre:</h3>
          <div class='picklistButtons'>
            <button class='picklistButton' type='button'>Country</button>
            <button class='picklistButton' type='button'>Indie</button>
            <button class='picklistButton' type='button'>House</button>
            <button class='picklistButton' type='button'>Pop</button>
            <button class='picklistButton' type='button'>Dubstep</button>
            <button class='picklistButton' type='button'>Acoustic</button>
            <button class='picklistButton' type='button'>Mixed</button>
            <button class='picklistButton' type='button'>Folk</button>
            <button class='picklistButton' type='button'>Dance</button>
            </div>
      </div>
  <div class='submitButtonDiv'>
      <button class='buttons' type='button'>SUBMIT</button>
  </div>";
    }

  }

  function getData () {
      $dom = new DOMDocument;
      $dom -> loadHTML ($data);
      foreach ($divs as $div){
          if ($div -> hasAttribute('class') && strpos($div -> getAttribute('class'), 'searchBar') !== false) 
          {
              return $div -> nodeValue;
          }
      }

  }

  function identifyTrack($index) {
   //$_SESSION['historyScroll'] = 'tableplaylist';
   $string = json_encode ($_SESSION["latestQueryResult"]);
   $json = $_SESSION["latestQueryResult"];
   $userID = $_SESSION['userID'];
   global $playlistID;
   //echo "<div style='color:white'>$userID</div>";
   //echo "<div style='color: white'>" . ($json[$index]['artist']['name']) . "</div>";
   //echo "<div style='color: white'>" . ($json[$index]['title']) . "</div>";
   //echo "<div style='color: white'>" . (gmdate("i:s", $json[$index]['duration'])) . "</div>";
    addSong($json[$index]['title'], $json[$index]['artist']['name'], gmdate("i:s", $json[$index]['duration']));

  }
  


  function addSong($title, $artist, $duration)
{

  $playlistID = explode('?', $_SERVER['REQUEST_URI']);
  $playlistID = end($playlistID);
  $title = addslashes($title);
  $artist = addslashes($artist);
   global $db;
   //$userID = (int)$userID;
   $getSongInfo = "SELECT * FROM Songs WHERE Songs.Title = '$title'";
   //echo $title;

   $songResult = mysqli_query($db, $getSongInfo);
   $rows = mysqli_fetch_assoc($songResult);

   error_reporting(E_ALL);
   ini_set('display_errors', 'on');

   if ($rows != ""){
    $databaseSong =  $rows['Title'];
   }else{
      $databaseSong = "";
   }
    if ($databaseSong == $title){
      //echo "hejhejhej";
      //echo $databaseSong;

      $querySongID = "SELECT * FROM Songs WHERE Songs.Title = '$title' AND Songs.Artist = '$artist'";
      $songResult = mysqli_query($db, $querySongID);
      $rows = mysqli_fetch_assoc($songResult);
      $songID = $rows['SongID'];
      //echo $title, $artist;
      //echo $songID;
      
    }else{ 
      $query="INSERT INTO Songs (title, artist, duration) VALUES ('$title', '$artist', '$duration')";
        if ($db->query($query) === TRUE) {
          //echo "Added";

        } else {
           echo "Error updating: " . $db->error;
      }
    }

    $alreadyExistingSong = "INSERT INTO PlaylistSongs (SongID, PlaylistID) VALUES ('$songID', '$playlistID')";
    $updatePlaylistSong = mysqli_query($db, $alreadyExistingSong);
}

  ?>
  </div>



<?php include 'footer.php' ?>
</html>