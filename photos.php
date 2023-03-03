<?php
   $GLOBALS["page_id"] = "photos";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calvary United Methodist Church</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&family=Kanit:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/gallery.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js" integrity="sha512-f8mwTB+Bs8a5c46DEm7HQLcJuHMBaH/UFlcgyetMqqkvTcYg4g5VXsYR71b3qC82lZytjNYvBj2pf0VekA9/FQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/minimasonry.min.js"></script>
    <script src="./js/nav.js" defer></script>
    <script src="./js/anims.js" defer></script>
    <script src="./js/force_http.js"></script>
    <script src="./js/photo_gallery.js" defer></script>
</head>
<body>
    <!-- Nav System -->
   <?php
    include("./inc/inc_nav.php");
   ?>

    <div id="albumBar">
    <?php
        $json_data = json_decode(file_get_contents("./data/photos.json"));
        $current_category = (isset($_GET["category"])) ? $_GET["category"] : 0;

        //Build Categories
        
        $counter = 0;
        foreach($json_data as $category){
            $active_class = ($counter == $current_category) ? "class='active'" : "";
            echo "<a href='./photos.php?category=$counter' $active_class>$category->title</a>";
            ++$counter;
        }
    ?>
    </div>

    <div class="center">
    <div id="galleryContainer">
    <?php
        
        // Build Photos
            foreach($json_data[$current_category]->urls as $url){
                ?>
                    <img src="./img/placeholder.jpg" data-src="<?php echo $url; ?>" alt="Photo" class="gallery-item">
                <?php
                }
    ?>
    </div>
    </div>
</body>
</html>