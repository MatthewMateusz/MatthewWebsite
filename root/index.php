<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <link rel="stylesheet" href="link.css">
        <link rel="stylesheet" href="column.css">
		<link rel="stylesheet" href="note.css">
    </head>
    <body>
        <?php
        $xml= simplexml_load_file("links.xml") or die ("F");
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
    </body>
</html>
