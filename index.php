<?php
   $GLOBALS["page_id"] = "home";
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js" integrity="sha512-f8mwTB+Bs8a5c46DEm7HQLcJuHMBaH/UFlcgyetMqqkvTcYg4g5VXsYR71b3qC82lZytjNYvBj2pf0VekA9/FQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/nav.js" defer></script>
    <script src="./js/anims.js" defer></script>
    <script src="https://beta.ourmanna.com/verses/api/js/" type="text/javascript" defer></script>
</head>
<body>
    <header>
        <!-- Nav System -->
        <?php
        include("./inc/inc_nav.php");
        ?>

        <!-- Landing Page -->
        <h1>Calvary United</h1>
        <h2>Methodist</h2>
        <div id="mainButtonWrapper">
            <a href="<?php echo file_get_contents("./data/bulletin.txt"); ?>" target="_blank" class="button-one">Bulletin</a>
            <a href="https://www.youtube.com/@calvaryunitedmethodistchur3164/videos" target="_blank" class="button-one">Past Sermons</a>
        </div>
    </header>

    <!-- Service Times Section -->
    <section id="timesSection">
        <h2>Service Times</h2>
        <div id="timesGrid">
            <div class="time-item">
                <div class="title">Sunday School</div>
                <div class="day">Sunday</div>
                <div class="time">9:45AM</div>
            </div>

            <div class="time-item">
                <div class="title">Morning Worship</div>
                <div class="day">Sunday</div>
                <div class="time">11:00AM</div>
            </div>

            <div class="time-item">
                <div class="title">Evening Worship</div>
                <div class="day">Sunday</div>
                <div class="time">6:00AM</div>
            </div>

            <div class="time-item">
                <div class="title">Bible Study</div>
                <div class="day">Tuesday</div>
                <div class="time">10:30AM</div>
            </div>

            <div class="time-item">
                <div class="title">Open for Prayer</div>
                <div class="day">Wednesday</div>
                <div class="time">All Day</div>
            </div>

            <div>
            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section id="locationSection">
        <h2>Location</h2>
        <div class="location">
            421 South Main Street <br> Swainsboro, GA <br>
                30401478-237-2191 Office
        </div>
    </section>

    <!-- Meet the Pastor Section -->
    <section id="pastorSection">
    <div class="center">
        <div id="dailyBibleVerseContainer">
            <div class="title">Daily Bible Verse</div>
            
                <div id="ourmanna-verse">Verse Loading...</div>
        </div>
</div>

        </div>
        <h2>Meet the Pastor</h2>
        <h4>Tom Tidwell</h4>

        <div id="pastorWrapper">
            <img src="./img/pastor.jpg" alt="Photo of Pastor">
            <span>
                I was called into ministry in 2006 as a Part Time Local Pastor. Our first appointment was at Garfield UMC. We served at Garfield for five years until 2011. In 2011 we were moved to the Girard Charge (Bethany and Bethesda UMC) where we served for ten years until this year. Calvary UMC is our third appointment. I was a bi-vocational Part Time Local Pastor until I retired from Southern Nuclear in April of this year after forty years of service. Calvary UMC is our first full time appointment. <br>
                My wife (Nona) and I have been married for thirty-three years. We have two children, a son and a daughter. We have four grandchildren and we are expecting our first great granddaughter in December.
                Nona and I are excited and blessed to be here at Calvary. We are looking forward to serving with the folks at Calvary and seeing the great things God has in store for us.
            </span>
        </div>
    </section>
    <!-- Footer -->
    <?php include("./inc/inc_footer.php"); ?>
</body>
</html>