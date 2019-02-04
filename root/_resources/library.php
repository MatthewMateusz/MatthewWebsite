<?php 

function getMusicBoxes ($resource, $__File__) {
    $xml = simplexml_load_file($resource) or die ('Error loading file');
    if ($xml != 'Error loading file') {
        $single = Array();
        $ep     = Array();
        $lp     = Array();
        foreach($xml -> children() as $release) {
            $type = $release['type'];
            $id = $release['id'];
            if ($type == 'single') {
                array_push($single, $id);
            } else if ($type =='ep') {
                array_push($ep, $id);
            } else {
                array_push($lp, $id);
            }
        }
        echo '<h1 class="centerText">Matthew&apos;s Music</h1><hr>';
        echo '<h2>Singles</h2>';
        //Print all singles
        echo '<div class="row">';
        foreach ($single as $i) {
            foreach ($xml -> children() as $release) {
                if ($release['id'] == $i) {
                    echo '<div class="column4">
                    <div class="card">
                    <a href="music.php?musicid='.$release['id'].'">';
                    echo '<img class="responImage" src="'.$release->imagePath.'">';
                    echo '<p class="link">'.$release->name.'</a></p>';
                    echo '</div></div>';
                }
            }
        }
        if (sizeof($single) == 0) {
            echo '<span class="bold">Looks like nothing has been released yet</span>';
        }
        echo '</div>';
        echo '<hr><h2>EPs</h2>';
        //Print all eps
        echo '<div class="row">';
        foreach($ep as $i) {
            foreach ($xml->children() as $release) {
                if ($release['id']==$i) {
                    echo '<div class="column4">
                    <div class="card">';
                    echo '<img class="responImage" src="'.$release->imagePath.'">';
                    echo '<p class="link"><a href="music.php?musicid='.$release['id'].'">'.$release->name.'</a></p>';
                    echo '<div></div>';
                }
            }
        }
        if (sizeof($ep) == 0) {
            echo '<span class="bold">Looks like nothing has been released yet</span>';
        }
        echo '</div>';
        echo '<hr><h2>Albums</h2>';
        //print all albums/lps
        echo '<div class="row">';
        foreach ($lp as $i) {
            foreach ($xml->children as $release ) {
                if ($release['id']==$i) {
                    echo '<div class="column4">
                    <div class="card">
                    <img class="responImage" src="'.$release->imagePath.'">
                    <p class="link"><a href="music.php?musicid='.$release['id'].'">'.$relase->name.'</a></p>
                    </div
                    </div>>';
                }
            }
        }
        if (sizeof($lp) == 0) {
            echo '<span class="bold">Looks like nothing has been released yet</span>';
        }
        echo '</div>';
        echo '<hr>';
    }

}







function printTopNav ($resource, $__File__) {
    function relativeBegining ($up) {
        $return="";
        for ($i=0; $i < $up; $i++) {
            $return .= "../";
        }
        return $return;
    }

    //Declaring global function variables
    $path;
    $xml= simplexml_load_file($resource) or die ('F');

    echo "<div class='topnav' id='TopNav'>";
    //Finding what file we are currently in
    if ($xml != "F") {
        foreach ($xml -> children() as $child) {
            $tagName = $child -> getname();
            if ($tagName == "link") {
                $relativePath = $child -> path;
                if (basename($relativePath) == basename($__File__)) {
                    $path = $relativePath;
                    break;
                }
            } else if ($tagName == "dropdown") {
                foreach ($child -> children() as $cchild) {
                    $tag = $cchild -> getname();
                    if ($tag == "link") {
                        $rp = $cchild -> path;
                        if (basename($rp) == basename($__File__)) {
                            $path = $rp;
                            break;
                        }
                    }
                }
            }
        }
        //Construct the TopNav
        foreach ($xml -> children() as $child) {
            $childTag = $child -> getname();
            if ($childTag == "link") {
                $rPath = $child -> path;
                $show = $child -> show;
                $finalPath = "";

                if ($path == $rPath) {
                    echo "<a href=''> ".$show." </a>";
                } else {
                    $upDir = count(explode("/",$path))-1;
                    $finalPath = relativeBegining($upDir) . $rPath;
                    echo "<a href=". $finalPath ."> ".$show." </a>";
                }
                
            } else if ($childTag == "dropdown") {
                $drpTag = $child -> show;
                
                echo "<div class='dropdown'>";
                echo "<button class='dropbtn'>";
                echo $drpTag . " ";
                echo "<i class='fa fa-caret-down'></i>";
                echo "</button>";
                echo "<div class='dropdown-content'>";
                foreach ($child -> children() as $links) {
                    $nt = $links -> getname();
                    if ($nt == "link") {
                        $rPath = $links -> path;
                        $show  = $links -> show;
                        $finalPath = "";
                        if ($path == $rPath) {
                            echo "<a href=''> ".$show." </a>";
                        } else {
                            $upDir = count(explode("/",$path))-1;
                            $finalPath = relativeBegining($upDir) . $rPath;
                            echo "<a href=". $finalPath ."> ".$show." </a>";
                        }
                    }
                    
                }
                echo "</div>";
                echo "</div>";
            }
        }
    }
    echo "<a href='javascript:void(0)' class='icon' onclick='toggleResponsive()'>&#9776;</a>";
    echo "</div>";
}

?>