<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tips & Tricks</title>
    <?php include("../Master/Header.php"); ?>

    <link rel="stylesheet" href="../CSS/TipsandTricks.css">
    <script>
        var page_header = document.getElementById("#page_header");
        page_header.innerText = "Tips & Tricks";
    </script>
</head>

<body>
    <!-- Videos -->
    <div class="page-container">
        <div class="row" id="top">
            <div class="col-7">
                <h3><i>Dogumentary TV</i> - Training Videos</h3>
                <div id="lesson1">
                    <iframe class="embedVideo d-block w-100" src="https://www.youtube.com/embed/1oDGa2yPb2g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p class="header">Lesson 1</p>
                </div>
                <div id="lesson2">
                    <iframe class="embedVideo d-block w-100" src="https://www.youtube.com/embed/MW8X0IMVjzQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p class="header">Lesson 2: Recall</p>
                </div>
                <div id="lesson3">
                    <iframe class="embedVideo d-block w-100" src="https://www.youtube.com/embed/psemvgmsI3Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p class="header">Lesson 3: Luring</p>
                </div>
                <div id="lesson4">
                    <iframe class="embedVideo d-block w-100" src="https://www.youtube.com/embed/Zt31jNGAKz4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p class="header">Lesson 4: Going to a Place</p>
                </div>
                <div id="lesson5">
                    <iframe class="embedVideo d-block w-100" src="https://www.youtube.com/embed/zEusaPfbn9s" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p class="header">Lesson 5: Heeling Position</p>
                </div>
                <div class="row">
                    <div class="col thumbnailVideo active_thumbnail" id="lesson1_thumbnail" onclick="displayVideo('lesson1')">
                        <img src="https://img.youtube.com/vi/1oDGa2yPb2g/0.jpg" alt="">
                    </div>
                    <div class="col thumbnailVideo" id="lesson2_thumbnail" onclick="displayVideo('lesson2')">
                        <img src="https://img.youtube.com/vi/MW8X0IMVjzQ/0.jpg" alt="">
                    </div>
                    <div class="col thumbnailVideo" id="lesson3_thumbnail" onclick="displayVideo('lesson3')">
                        <img src="https://img.youtube.com/vi/psemvgmsI3Y/0.jpg" alt="">
                    </div>
                    <div class="col thumbnailVideo" id="lesson4_thumbnail" onclick="displayVideo('lesson4')">
                        <img src="https://img.youtube.com/vi/Zt31jNGAKz4/0.jpg" alt="">
                    </div>
                    <div class="col thumbnailVideo" id="lesson5_thumbnail" onclick="displayVideo('lesson5')">
                        <img src="https://img.youtube.com/vi/zEusaPfbn9s/0.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="col">
                <!-- Article Links -->
                <p class="header">American Kennel Club Training Resources</p>
                <hr>
                <ul class="links">
                    <li class="resourceLink">
                        <a target="_blank" href="https://www.akc.org/expert-advice/training/basic-obedience-training-for-your-dog/">
                            <img class="col-4" src="https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/08/02132642/Puppy-kindergarten-Class-AKC_5921.jpg" alt="">
                            Basic Obedience Training For Puppies: Where to Start
                        </a>
                    </li>
                    <li class="resourceLink">
                        <a target="_blank" href="https://www.akc.org/expert-advice/training/thunderstorms-calm-dog-afraid-behavior/">
                            <img class="col-4" src="http://s3-us-west-2.amazonaws.com/akccontentimages/AKC_Health_Microsite/460059297_akcblogheader.jpg" alt="">
                            Helping Your Dog Deal with Lightning and Thunder
                        </a>
                    </li>
                    <li class="resourceLink">
                        <a target="_blank" href="https://www.akc.org/expert-advice/training/how-to-stop-dog-barking/">
                            <img class="col-4" src="https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/12/12194329/Yellow-Lab-Puppy-Barking.jpg" alt="">
                            How to Stop Nuisance Dog Barking
                        </a>
                    </li>
                    <li class="resourceLink">
                        <a target="_blank" href="https://www.akc.org/expert-advice/training/how-to-stop-puppy-biting/">
                            <img class="col-4" src="https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/13001524/American-Staffordshire-Terrier-MP.jpg" alt="">
                            How To Stop Puppy Biting
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row" id="section 2">
        </div>
    </div>
    <?php include("../Master/Footer.php"); ?>
    
    <script>
        var lessons = ["lesson1", "lesson2", "lesson3", "lesson4", "lesson5"];
        var visibleLesson = null;

        function displayVideo(video) {
            var d_video = document.getElementById(video);
            var d_thumbnail = document.getElementById(video + "_thumbnail");

            if (visibleLesson != video) {
                visibleLesson = video;
            }
            hideNonVisibleLessons();
        }

        function hideNonVisibleLessons() {
            var i, video, d_video, d_thumbnail;
            for (i = 0; i < lessons.length; i++) {
                video = lessons[i];
                d_video = document.getElementById(video);
                d_thumbnail = document.getElementById(video + "_thumbnail");

                if (visibleLesson === video) {
                    d_video.style.display = "block";
                    d_thumbnail.classList.add("active_thumbnail");
                } else {
                    d_video.style.display = "none";
                    d_thumbnail.classList.remove("active_thumbnail");
                }
            }
        }
    </script>
</body>

</html>