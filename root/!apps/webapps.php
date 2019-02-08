<!doctype html>
<html>
<head>
    <title>Matthew's WebApps</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../_css/TopNav.css">
    <link rel="stylesheet" href="../_css/FontStyle.css">
    <link rel="stylesheet" href="../_css/column.css">
    <link rel="stylesheet" href="../_css/SocialMedia.css">
    <link rel="stylesheet" href="../_css/note.css">
	<link rel="stylesheet" href="webapps.css">

    <script src="../_js/TopNav.js"></script>
</head>
<body>
        <!--TopNav-->
        <?php
        include '../_resources/library.php';
        printTopNav("../_resources/topnav.xml",__File__);
        ?>
	
	<!--Content-->
	<br>
	<div class="centerOn700 information">
		<h1 class="centerText">Quick Introduction</h1>
		<p class="indentPar">
			This is the place where I host most of my web applications. 
			Any links in red indicate that the project is not ready to be viewed by the public. You can use Ctrl + F or Cmd + F to search 
			for applications on this page. Enjoy your visit.
		</p>
		<p class="indentPar">
			Almost all of the applications on this page should have a corresponding project article.
			You can find the project page over <a href="project.php" class="default">here</a> or by going under Apps and clicking Projects.
		</p>
		<h2 class="centerText">Legend</h2>
		<p>
			<ul class="noListStyle">
				<li><span class="disabled bold">link</span> &rarr; Link is currently disabled</li>
				<li><span class="enabled bold">link</span> &rarr; Link is currently enabled</li>
				<li><span class="visited bold">link</span> &rarr; You have visited this link</li>
			</ul>
		</p>
	</div>
	<br>
	
	
	
	<div class="row">
		<div class="column4">
			<div class="card">
				<img class="responImage" src="../_media/images/underConstruction.png">
				<p class="centerText"><a href="" class="disabled app">Website Live Chat</a></p>
			</div>
		</div>
	</div>
	
	


    <div class="footer">
        <p>&#9400;2019 Matthew, All Rights Reserved</p>
    </div>
</body>
</html>