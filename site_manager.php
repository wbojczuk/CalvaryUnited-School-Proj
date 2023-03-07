<?php
session_set_cookie_params(0, "/");
session_start();
$page = (isset($_GET["page"])) ? $_GET["page"] : "home" ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calvary United Methodist : Site Manager</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&family=Kanit:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./site_manager/css/site_manager.css">
    <?php
    if($page == "photos"){
        echo '<link rel="stylesheet" href="./css/gallery.css">';
    }
    ?>
    <script src="./site_manager/js/jsdev.min.js"></script>
</head>
<body>
    <nav>
        <div id="navLogo">Admin</div>
        <div class="tools-title">Dashboard</div>

        <a href="./site_manager.php?page=bulletin">Bulletin</a>
        <a href="./site_manager.php?page=photos">Photos</a>
    </nav>

    <div id="mainContent">
    <?php
        if(!isset($_SESSION["login"])){
            include("./site_manager/inc/inc_login_form.php");
        }else{
            $word_page = ucwords($page);
            echo "<div id='pageTitle'>$word_page</div>";
            include("./site_manager/inc/inc_admin_$page.php");
        }
    ?>
    </div>
</body>
</html>