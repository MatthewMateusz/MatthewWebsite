<!doctype html>
<html>
    <head>
        <?php
            if (isset($_GET['projectId'])) {
                echo "<title>Project ". $_GET['projectId'] ."</title>";
                $isValid = true;
            } else {
                echo "<title>Invalid URL</title>";
                $isValid = false;
            }

            function formatDate($normalDate) {
                $partDate = explode("/", $normalDate);
                $formatDate = implode($partDate);
                return $formatDate;
            }
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="../_css/FontStyle.css">
        <link rel="stylesheet" href="../_css/column.css">
        <link rel="stylesheet" href="../_css/contentBars.css">
        <link rel="stylesheet" href="../_css/SocialMedia.css">
        <link rel="stylesheet" href="../_css/note.css">
        <link rel="stylesheet" href="project.css">
    </head>

    <body>
    <?php

    if ($isValid) {
        $gotProject = false;
        $xml = simplexml_load_file("../_resources/projects.xml") or die ("F");
        if ($xml != "F") {
            foreach ($xml -> children() as $project) {
                $projectId = $project -> id;
                if ($projectId == $_GET['projectId']) {
                    $gotProject = true;
                    $projectName        = $project -> name;
                    $projectStart       = $project -> start;
                    $projectEnd         = $project -> end;
                    $projectState       = $project -> state;
                    $projectStatus      = $project -> status;
                    $projectProgress    = $project -> progress;
                    $projectDescription = $project -> description;
                    
                    $projectReportGroup     = $project -> reports;
                    $projectReports         = $projectReportGroup -> report;
                    $latestReport;

                    //Get all reports into a array that will be sorted;
                    $amountOfReports = $projectReports->count();
                    foreach ($projectReports as $report) {
                        $arrayReports[(string)($report->attributes())] = $report;
                    }
                    krsort ($arrayReports, 1);
                    reset($arrayReports);
                    
                    echo "<div>";
                    echo "<h1 class='centerText'>". ucwords($projectName) ."</h1>";
                    echo "</div>";
                    echo "<hr>";

                    echo "<h2>Short Information</h2>";
                    echo "<ul>";
                    echo "<li>Project started: ". $projectStart ."</li>";
                    echo "<li>Project ended: ". $projectEnd ."</li>";
                    echo "<li>Project state: ". $projectState ."</li>";
                    echo "<li>Project status: ". $projectStatus ."</li>";
                    echo "<li>Project progress: ". $projectProgress ."</li>";
                    echo "</ul>";
                    echo "<h2>Pararaph Information</h2>";
                    echo "<span class='b'>Project description:</span>";
                    echo "<p class='report'>";
                    echo $projectDescription;
                    echo "</p>";
                    echo "<span class='b'>Latest project report:</span>";
                    echo "<p class='report'>";
                    if (key($arrayReports) != "null") {
                        echo "<span class='italic'>On ". key($arrayReports) .":</span><br>";//
                    }
                    echo current($arrayReports);
                    echo "</p>";
                    echo "<span class='b'>Older reports:</span>";
                    while (next($arrayReports)) {
                        echo "<p class='report'>";
                        if (key($arrayReports) != "null") {
                            echo "<span class='italic'>On ". key($arrayReports) .":</span><br>";//
                        }
                        echo current($arrayReports);
                        echo "</p>";
                    }

                } 
                    
            }
        }
        if (!$gotProject) {
            echo "<h1 class='centerText'>Invalid project ID passed in URL</h1><hr>";
        }
    }
    ?>
    <div class="footer">
            <p>&#9400;2018 Matthew, All Rights Reserved</p>
        </div>
    </body>
</html>