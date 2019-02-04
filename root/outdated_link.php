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
        <!--TopNav-->
        <?php
        include '_resources/library.php';
        printTopNav("_resources/topnav.xml",__File__);
        ?>


        <?php
        $xml= simplexml_load_file("_resources/links.xml") or die ('F');
       $rowOpened = false;
       
	if ($xml != "F") 
	{
		foreach ($xml->children() as $child) 
        		{
					$tagN = $child->getName();
					if ($tagN == "h") 
					{
						if($rowOpened == true) 
						{
							//Execute code to close row
							echo "</div>";
							$rowOpened = false;
						}
						$headingType = $child->attributes();
						echo "<h" . $headingType . ">". $child."</h". $headingType. "> <hr>";
					}
					else if ($tagN == "link") 
					{
						if ($rowOpened == false)
						{
							//Open Row
							echo "<div class='row'>";
							$rowOpened = true;
						}
						//Create Link
						$href = $child->href;
						$name = $child->name;
						//test echo will be replaced
						echo "<div class='column4'>";
						echo "<div class='card'>";
						echo "<p class='link'>";
						echo "<a href='". $href ."'>" . $name . "</a>";
						echo "</p>";
						echo "</div>";
						echo "</div>";
					}
					else if ($tagN == "note") 
					{
						if ($rowOpened == true) 
						{
							echo "</div>";
							$rowOpened = false;
						}
						$noteType = $child->attributes();
						echo "<div class='note " . $noteType ."'>";
						echo "<p>";
						echo "<strong>". ucwords($tagN).":" . "</strong>" . $child;
						echo "</p>";
						echo "</div>";
						
					}

            	}
			if ($rowOpened == true) 
			{
				echo "</div>";
			}
	}
	else 
	{
		echo "<h1>Failed to load resource contact webmaster ASAP</h1>";
	}
       
       
        ?>

        <!--Footer & Copyright-->
        <div class="footer">
            <p>&#9400;2019 Matthew, All Rights Reserved</p>
        </div>
    </body>
</html>