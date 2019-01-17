<?php 


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