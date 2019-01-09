<!doctype html>
<html>
    <head>
        <title>Projects</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="../_css/TopNav.css">
        <link rel="stylesheet" href="../_css/FontStyle.css">
        <link rel="stylesheet" href="../_css/column.css">
        <link rel="stylesheet" href="../_css/contentBars.css">
        <link rel="stylesheet" href="../_css/SocialMedia.css">
        <link rel="stylesheet" href="../_css/note.css">
        <link rel="stylesheet" href="project.css">

        <script src="../_js/TopNav.js"></script>
    </head>

    <body>
        <div class="topnav" id="TopNav">
            <a href="../index.html"> Home </a>
            <a href="../link.php">Links</a>
            <div class="dropdown">
                <button class="dropbtn active">
                    Apps
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="webapps.html">WebApps</a>
                    <a href="">Projects</a>
                </div>
            </div>
            <a href="../music.html">Music</a>
            <div class="dropdown active">
                <button class="dropbtn">
                    Other
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="../!other/downloadcenter.html"> Download Center</a>
                    <a href="../!other/otherwebsites.html"> Other Websites</a>
                    <a href="../!other/about.html"> About</a>
                </div>
            </div>
            <a href="javascript:void(0)" class="icon" onclick="toggleResponsive()">&#9776;</a>
        </div>
    

        <h1 class="centerText">Matthew's Project</h1>
        <hr>
        <article class="centerOn700">
            <hr>
            <?php
            $xml = simplexml_load_file("../_resources/projects.xml") or die ("F");

            if ($xml != "F") {
                foreach ($xml -> children() as $project) {
                    $xmlTag = $project -> getName();
                    if ($xmlTag == "project") {
                        $mainImgSRC          = $project -> mainImg;
                        $projectName         = $project -> name;
                        $projectId           = $project -> id;
                        $projectStatus       = $project -> status;
                        $projectState        = $project -> state;
                        $projectProgress     = $project -> progress;
                        $projectDescription  = $project -> description;

                        echo "<section>";
                        echo "<img class='responImage' src='". $mainImgSRC ."'>";
                        echo "<h1 class='centerText'>". $projectName ."</h1>";
                        echo "<p>";
                        echo "Project ID: <span class='projectID'>". $projectId ."</span><br>";
                        echo "Project status: <span class='status'>". $projectStatus ."</span><br>";
                        echo "Project state: <span>". $projectState ."</span><br>";
                        echo "Project progress: <span>". $projectProgress ."</span><br>";
                        echo "Project descripition: ";
                        echo "</p>";

                        echo "<p class='projectReport'>";
                        echo $projectDescription;
                        echo "</p>";
                        echo "<p class='centerText'>For more information ";
                        echo "<a href='projectInfo.php?projectId=". $projectId ."' target='_blank'>";
                        echo "click here";
                        echo "</a>";
                        echo "</p>";
                        echo "</section>";
                        echo "<hr>";
                    } 
                }
            }
            ?>
        </article>
    </body>       

</html>