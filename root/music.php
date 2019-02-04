<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="_resources/icon/iconMain.png" type="image/x-icon">
        <title>Matthew's Music</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="_css/FontStyle.css">

        <link rel="stylesheet" href="_css/TopNav.css">
        <script src="_js/TopNav.js"></script>

        <link rel="stylesheet" href="_css/column.css">
        <link rel="stylesheet" href="_css/note.css">
        <link rel="stylesheet" href="_css/SocialMedia.css">
        <link rel="stylesheet" href="_css/music.css">
    </head>
    <body>
        <!--TopNav-->
        <?php
        include '_resources/library.php';
        printTopNav("_resources/topnav.xml",__File__);
        ?>

        <!--Actual Content-->
        <div class="centerText spaceAbove">
            <a class="sm fa fa-bandcamp" href="https://matthewmateusz.bandcamp.com/" target="_blank"></a>
            <a class="sm fa fa-soundcloud" href="https://soundcloud.com/matthewmateusz" target="_blank"></a>
            <a class="sm fa fa-youtube" href="https://www.youtube.com/channel/UC49J6yoeGnh1l26f46YybgA/" target="_blank"></a>
        </div>
        
        <?php
        getMusicBoxes("_resources/music.xml",__File__);
        if (isset($_GET['musicid'])) {
            $xml = simplexml_load_file('_resources/music.xml') or die ('Error loading resource');
            if ($xml != 'Error loading resource') {
                foreach ($xml->children() as $release) {
                    if ($_GET['musicid']==$release['id']) {
                        //Create content popup
                        echo '
                        <div id="musicModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <div class="row padDown">
                                    <div class="column2">
                                        <img class="responImage" src="'.$release->imagePath.'">
                                    </div>
                                    <div class="column2 relative">
                                        <span class="musicTitle">'.$release->name.'</span>
                                    </div>
                                </div>
                                Description:<br>
                                <p class="indentPar">'.$release->description.'</p>
                                <p>Song(s): <br>
                                    <ul>        
                                ';
                        foreach($release->music->children() as $songName) {
                            echo '<li>'.$songName['name'].'</li>';
                        }
                        echo '
                                    </ul>
                                </p>

                                <div class="strongBold">
                                    Music Links
                                </div>
                                <div class="centerText spaceAbove">
                        ';
                        foreach($release->media->children() as $link) {
                            echo '
                                    <a class="sm fa fa-'.$link['type'].'" href="'.$link.'" target="_blank" download></a>
                            ';
                        }
                        echo'        
                                </div>
                                <div class="centerText spaceAbove">
                                    <span class="strongBold">Other Information</span>
                                </div>
                                <p>'.$release->custom.'</p>
                            </div>
                        </div>
                        ';
                        

                    }
                }
            }
        }

        ?>
        
        <script src="_js/modalControl.js"></script>
        


    </body>
</html>