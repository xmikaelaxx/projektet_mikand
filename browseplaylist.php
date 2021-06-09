<?php include 'ext.php'?>
<?php include 'header.php'?>

<?php $_SESSION['historySearch']=""; ?>

<!DOCTYPE html>
<body class ="backgroundBlue"> 


<div class="breadcrumb-box">
        <ul class="breadcrumbs">
            <li class="breadcrumb-item">
                <a href="startpage.php" class="crumb">home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="browseplaylist.php" class="crumb">php variabeln hallå</a>
            </li>
        </ul>
    </div>

<h2 class="specificPlaylistTitle">php variabeln hallå</h2>
<h3 class="specificPlaylistUsername">by php variabel user</h3>

    <div class="tablePlaylist">
   <table> 
    <tr>
    <th>Artist</th>
    <th>Title</th>
    <th>Genre</th>
    <th>Duration</th>
    <th> ♡ </th>
  </tr>
  <tr>
    <td>Queen</td>
    <td>Bohemian Rhapsody</td>
    <td>Rock</td>
    <td>05:55</td>
    <td></td>
  </tr>
  <tr>
    <td>Dire Straits</td>
    <td>Sultans of Swing</td>
    <td>Blues Rock</td>
    <td>05:48</td>
    <td></td>
  </tr>
  <tr>
    <td>Muse</td>
    <td>Uprising</td>
    <td>Electronic Rock</td>
    <td>05:04</td>
    <td></td>
  </tr>
  <tr>
    <td>The Killers</td>
    <td>Mr. Brightside</td>
    <td>Alternative</td>
    <td>03:42</td>
    <td></td>
  </tr>
  <tr>
    <td>Bob Dylan</td>
    <td>Lay, Lady, Lay</td>
    <td>Jazz</td>
    <td>03:17</td>
    <td></td>
  </tr>
  <tr>
    <td>Nicky Jam; Enrique Iglesias</td>
    <td>El Perdón</td>
    <td>Reggaeton</td>
    <td>03:27</td>
    <td></td>
  </tr>
</table>
    </div>



<?php include 'footer.php' ?>
</body>
</html>