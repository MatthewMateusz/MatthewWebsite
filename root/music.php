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
        <h1 class="centerText">Music Links</h1>
        <div class="centerText">
            <a class="sm fa fa-bandcamp" href="https://matthewmateusz.bandcamp.com/" target="_blank"></a>
            <a class="sm fa fa-soundcloud" href="https://soundcloud.com/matthewmateusz" target="_blank"></a>
            <a class="sm fa fa-youtube" href="https://www.youtube.com/channel/UC49J6yoeGnh1l26f46YybgA/" target="_blank"></a>
        </div>
        <h1 class="centerText">Music Feed</h1>
        <p class="centerText">Newest music is always on top</p>
        <div class="centerText spaceAbove">
            <!--Put new frames before everything else || after this comment line-->
            <iframe style="border: 0; width: 350px; height: 442px;" src="https://bandcamp.com/EmbeddedPlayer/track=243250530/size=large/bgcol=ffffff/linkcol=0687f5/tracklist=false/transparent=true/" seamless><a href="http://matthewmateusz.bandcamp.com/track/golden-hour">Golden Hour by MatthewMateusz</a></iframe>
        </div>
        


    </body>
</html>