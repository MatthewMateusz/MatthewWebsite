<!doctype html>
<html>
    <head>
        <title>Matthew's Links</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="_resources/icon/iconMain.png" type="image/x-icon">

        <!--Online References-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--Local References-->
        <link rel="stylesheet" href="_css/FontStyle.css">
        <link rel="stylesheet" href="_css/link.css">
        <link rel="stylesheet" href="_css/column.css">
        <link rel="stylesheet" href="_css/note.css">

        <link rel="stylesheet" href="_css/TopNav.css"> <!--TopNav-->
        <script src="_js/TopNav.js"></script> <!--TopNav-->
    </head>
    <body>
        <!--Top Nav-->
        <?php
        include '_resources/library.php';
        printTopNav("_resources/topnav.xml",__File__);

        $style;
        if (isset($_GET['style'])) {
            $style = $_GET['style'];
        } else {
            $style = 0;
        }

        echo '<p class="centerText">Styles:</p>';
        echo '<div class="pill">';
        if ($style == 0) {
            echo '
            <a href="link.php?style=0" class="pill active">Comfy</a>
            <a href="link.php?style=2" class="pill">Compact</a>
            <a href="link.php?style=1" class="pill">Strict</a>';
        } else if ($style == 1) {
            echo '
            <a href="link.php?style=0" class="pill">Comfy</a>
            <a href="link.php?style=2" class="pill">Compact</a>
            <a href="link.php?style=1" class="pill active">Strict</a>';
        } else if ($style == 2) {
            echo '
            <a href="link.php?style=0" class="pill">Comfy</a>
            <a href="link.php?style=2" class="pill active">Compact</a>
            <a href="link.php?style=1" class="pill">Strict</a>';
        }
        echo '</div>';

        $xml= simplexml_load_file("_resources/links.xml") or die ('F');
        if ($style == 0) {
            $rowOpened = false;
            foreach ($xml->children() as $child) {
                $tagName = $child->getName();
                if ($tagName == 'h') {
                    if ($rowOpened == true) {
                        echo '</div>';
                        $rowOpened = false;
                    }
                    if ($child['class'] != null) {
                        $headingType = $child['class'];
                        echo '<h'.$headingType.' class="compact">'.$child.'</h'.$headingType.'><hr>';
                    } else {
                        echo '<h2>'.$child.'</h2><hr>';
                    }
                } else if ($tagName == 'link') {
                    if ($rowOpened == false) {
                        echo '<div class="row">';
                        $rowOpened = true;
                    }
                    echo '
                    <div class="column4">
                        <div class="card">
                            <p class="link">
                                <a href="'.$child->href.'" target="_blank">'.$child->name.'</a>
                            </p>
                        </div>
                    </div>
                    ';
                } else if ($tagName == 'note') {
                    if ($rowOpened == true) {
                        echo '</div>';
                        $rowOpened = false;
                    }
                    echo '
                    <div class="note '.$child['type'].'">
                        <p>
                            <strong>'.ucwords($tagName).':</strong>'.$child.'
                        </p>
                    </div>
                    ';
                }
            }
            if ($rowOpened == true) {
                echo '</div>';
                $rowOpened = false;
            }
        } else if ($style == 1) {
            foreach ($xml->children() as $child) {
                $tagName = $child->getName();
                if ($tagName == 'h') {   
                    echo '<br><strong>'.$child.':</strong>';
                } else if ($tagName =='link') {
                    echo ' <a href="'.$child->href.'"class="classic" target="_blank"> '.$child->name.'</a>';
                }
            }
        } else if ($style == 2) {
            $rowOpened = false;
            foreach ($xml->children() as $child) {
                $tagName = $child->getName();
                if ($tagName == 'h') {
                    if ($rowOpened == true) {
                        echo '</div>';
                        $rowOpened = false;
                    }
                    if ($child['class'] != null) {
                        $headingType = $child['class'];
                        echo '<h'.$headingType.' class="compact">'.$child.'</h'.$headingType.'><hr>';
                    } else {
                        echo '<h2 class="compact">'.$child.'</h2><hr>';
                    }
                    
                } else if ($tagName == 'link') {
                    if ($rowOpened == false) {
                        echo '<div class="row compact">';
                        $rowOpened = true;
                    }
                    echo '
                    <div class="column4">
                        <div class="card compact">
                            <p class="link compact">
                                <a href="'.$child->href.'" target="_blank">'.$child->name.'</a>
                            </p>
                        </div>
                    </div>
                    ';
                } else if ($tagName == 'note') {
                    if ($rowOpened == true) {
                        echo '</div>';
                        $rowOpened = false;
                    }
                    echo '
                    <div class="note '.$child['type'].'">
                        <p>
                            <strong>'.ucwords($tagName).':</strong>'.$child.'
                        </p>
                    </div>
                    ';
                }
            }
            if ($rowOpened == true) {
                echo '</div>';
                $rowOpened = false;
            }
        }

        ?>
    </body>
</html>