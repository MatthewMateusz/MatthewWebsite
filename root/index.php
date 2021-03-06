<html>
    <head>
        <title>Matthew's Website</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="shortcut icon" href="_resources/icon/iconMain.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="_css/TopNav.css">
        <link rel="stylesheet" href="_css/FontStyle.css">
        <link rel="stylesheet" href="_css/column.css">
        <link rel="stylesheet" href="_css/SocialMedia.css">
        <link rel="stylesheet" href="_css/contentBars.css">
        <link rel="stylesheet" href="_css/note.css"> 

        <script src="_js/TopNav.js"></script>
    </head>

    <body>
        <!-- Banner Image -->
        <div class="TopHeader">
            <h1>Matthew's Website</h1>
            <p>Because why not</p>
        </div>

        <!--TopNav-->
        <?php
        include '_resources/library.php';
        printTopNav("_resources/topnav.xml",__File__);
        ?>

        <!-- Main Content -->
        <div class="contentHold">
            <div class="side">
                <h1 class="centerText">About Me</h1>
                <p class="indentPar">
                    I am sixteen years old who is experimenting in many different fields of study including music, electrical engineering, computer science, and countless others.
                </p>

                <h1 class="centerText"> Suggestions</h1>
                <p class="indentPar">
                    If you want to leave a suggestion to improve this website you can send a email to this address,
                    <a href="mailto:website@matthewm.com.pl?Subject=Suggestion(s)%20for%20Your%20Website">website@matthewm.com.pl</a>.
                </p>

                <h1 class="centerText">Social Media</h1>
                <div class="centerText">
                    <a class="sm fa fa-twitter" href="https://twitter.com/MatthewMateusz_" target="_blank"></a>
                    <a class="sm fa fa-youtube" href="https://www.youtube.com/channel/UC49J6yoeGnh1l26f46YybgA/" target="_blank"></a>
                    <a class="sm fa fa-bandcamp" href="https://matthewmateusz.bandcamp.com/" target="_blank"></a>
                    <a class="sm fa fa-soundcloud" href="https://soundcloud.com/matthewmateusz" target="_blank"></a>
                    <a class="sm fa fa-instagram" href="https://www.instagram.com/MatthewTheMateusz/" target="_blank"></a>
                    <p> You can use the email in the suggestions section to contact me too</p>
                </div>
            </div>

            <div class="main">
                <h1>Purpose</h1>
                <hr>
                <p class="indentPar">
                    The point of this website is to host my music and projects in an organized way that is presentable to others.
                    I also keep handy links for myself to quickly acess where ever I am. If some of you are interested in my projects, you
                    can view information on them and see their progress. I will also post my music here.
                </p>

                <h2>More interesting items will be added later, please leave suggestions</h2>
            </div>

        </div>

        <div class="footer">
            <p>&#9400;2019 Matthew, All Rights Reserved</p>
        </div>
    </body>
</html>