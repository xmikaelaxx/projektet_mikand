<?php include 'ext.php'?>
<?php include 'header.php'?>
<!DOCTYPE html>

<h2 class="specificPlaylistTitle">Create a playlist</h2>
<div class="createPlaylistSearch">
    <div class="startsearchDiv">
    <?php echo "<form id='formSearch' onclick='showResults()' method='POST' enctype='text'>
        <input class='searchBar' name='searchBar' type='text'></input>
        <input class='buttons' type='submit' value='SEARCH' name='startButton'></form>"; ?>
    </div>
</div>
<div class="displaySearchResults">
  <div class= "tablePlaylist">
  <?php 

  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['startButton'])){
      showResults($_POST['searchBar']);
  }

  for ($i = 0; $i < 150; $i++){
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addTrack_' . $i])){
      echo "<div style='color: white'>hello</div>";
      identifyTrack($i);
    }
}


  function showResults($mikaela) {
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
      echo "<table>";
      echo "<tr class ='createTableRow'>";
      echo "<th class ='createTableTitles'></th>";
      echo "<th class ='createTableTitles'>Artist</th>";
      echo "<th class ='createTableTitles'>Title</th>";
      echo "<th class ='createTableTitles'>Album</th>";
      echo "<th class ='createTableTitles'>Duration</th>";
      echo "</tr>";
      for ($i = 0; $i < count($data)-1; $i++){
      echo "<tr class = 'createTableRow'>";
      echo "<td><form id='formSearch' method='POST' enctype='text'><input class='addTrack' type='submit' value ='+' name='addTrack_$i'></input></form></td>";
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
   $string = json_encode ($_SESSION["latestQueryResult"]);
   $json = $_SESSION["latestQueryResult"];
   echo "<div style='color: white'>" . ($json[$index]['artist']['name']) . "</div>";
   echo "<div style='color: white'>" . ($json[$index]['title']) . "</div>";
   echo "<div style='color: white'>" . (gmdate("i:s", $json[$index]['duration'])) . "</div>";
   addsong($json[$index]['title'], $json[$index]['artist']['name'], gmdate("i:s", $json[$index]['duration']));
   
  }

  function addSong($title, $artist, $duration)
{
   global $db; 
   $query="INSERT INTO Songs (title, artist, duration) VALUES ('$title', '$artist', '$duration')";
   if ($db->query($query) === TRUE) {
    echo "Added";
 } else {
     echo "Error updating: " . $db->error;
  }
}

  ?>
  </div>



<?php include 'footer.php' ?>
</html>