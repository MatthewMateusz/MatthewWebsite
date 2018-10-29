
function toggleResponsive()
{
    var TopNav = document.getElementById("TopNav");
    if (TopNav.className === "topnav") {
        TopNav.className += " responsive";
    }
    else {
        TopNav.className = "topnav";
    }
}