<!doctype html>
<html>
    <head>
        <title>Download Center</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="../_css/TopNav.css">
        <link rel="stylesheet" href="../_css/FontStyle.css">
        <link rel="stylesheet" href="../_css/column.css">
        <link rel="stylesheet" href="../_css/SocialMedia.css">
        <link rel="stylesheet" href="../_css/note.css">
        <link rel="stylesheet" href="download.css">

        <script src="../_js/TopNav.js"></script>
    </head>
    <body>
        <!--TopNav-->
        <?php
        include '../_resources/library.php';
        printTopNav("../_resources/topnav.xml",__File__);
        ?>

        <br>
        <div class="centerOn700 information">
            <h1 class="centerText">Information</h1>
            <p class="indentPar">
                I will post some software I create here for you to download.

            </p>
            <h2 class="centerText">Legend</h2>
            <ul class="legend">
                <li><span class="enabled">enabled</span> &rarr; download is enabled</li>
                <li><span class="disabled">disabled</span> &rarr; download is disabled</li>
                <li><span class="visited">visited</span> &rarr; you have visted this download recently</li>
            </ul>
        </div>
    
        <!--Start download pannels-->
        <div class="row">
        <hr>
        <?php 
        
        $downloads = simplexml_load_file("../_resources/download.xml") or die('fail');

        if ($downloads != 'fails') {
            foreach($downloads->children() as $download){
                if ($download['status']!='2') {
                    echo '
                    <div class="column4">
                    <div class="card">';
                    if ($download['status']==0) {
                        echo '<p class="link"> <a class="download" href="downloadcenter.php?id='.$download['id'].'">'.$download->name.'</a></p>';
                    } else {
                        echo '<p class="link"> <a class="download disabled" href="downloadcenter.php">'.$download->name.'</a></p>';
                    }
                    echo '
                    </div>
                    </div>
                    ';
                }
            }
        }

        if (isset($_GET['id'])) {
            foreach($downloads->children() as $download) {
                if ($download['id']==$_GET['id']) {
                    echo '
                    <div class="modal" id="musicModal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h1 class="centerText">'.$download->name.'</h1>
                            <h2>Description</h2>
                            <p class="indentPar">
                                '.$download->description.'
                            </p>
                        </div>
                    </div>
                    ';
                }
            }
        }
        ?>
        </div>

        <script src="../_js/modalControl.js"></script>
        <div class="footer">
            <p>&#9400;2019 Matthew, All Rights Reserved</p>
        </div>
    </body>
</html>