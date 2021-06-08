<?php include 'ext.php'?>
<?php include 'header.php'?>

<body>

<div class="allContentStart">
<div class="backgroundDivBlue2"> 
    </div> 
    <div class="first">
        <div class="startImage">
            <div class="placeholderImage"><p class="placeholderText">placeholder
                <br>placeholder<br>placeholder<br>placeholder<br>placeholder<br>placeholder
                <br>placeholder<br>placeholder<br>placeholder<br>placeholder<br></p> </div>
            </div>
        <div class="startTextDiv">
            <h2 class="startText">WELCOME <br> TO A <br> WORLD OF <br> MUSIC</h2>
        </div>
    </div>
    <div class="second">
        <h2>Do you already know what you like?</h2>
        <div class="startsearchDiv">
        <!--<input class="searchBar" id="searchBar" type="text"></input>
        <button class="buttons" id="startButton" type="button">SEARCH</button>
        </div>-->
        <?php echo "<form id='formSearch' action='playlists.php' method='POST' enctype='text'>
        <input class='searchBar' name='searchlist' type='text'></input>
        <input class='buttons' type='submit' value='SEARCH' name='startButton'></form>"; ?>
    </div> 
    <div class="backgroundDivBlue"> 
    </div>  
    <div class="space">
    </div>
    <div class="third">
    <div class="trendingTextDiv">
        <h2>TRENDING <br> RIGHT NOW</h2>
        </div>
        <div class="trendingPlaylistDiv">
                <div class="playlistDiv">
                <p class="placeholderText">placeholder
                <br>placeholder<br>placeholder<br></p> 
                </div>
                <div class="playlistDiv">
                <p class="placeholderText">placeholder
                <br>placeholder<br>placeholder<br></p> 
                </div>
                <div class="playlistDiv">
                <p class="placeholderText">placeholder
                <br>placeholder<br>placeholder<br></p> 
                </div>
                <div class="playlistDiv">
                <p class="placeholderText">placeholder
                <br>placeholder<br>placeholder<br></p> 
                </div>
        </div>
    </div>
</div>

    



<?php include 'footer.php' ?>
</body>


