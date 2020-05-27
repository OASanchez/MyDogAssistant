<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("../Master/Header.php");
    ?>

    <link rel="stylesheet" href="../CSS/Home.css">
</head>

<body>
    <div class="page-container">
        <div class="content-wrap">
            <div id="home" class="multi-grad">
                <div id="heading">
                    <h1>Welcome to the MyDog Virtual Assistant</h1>
                    <h4>Start by selecting a bubble, or scroll down to search by breed</h4>
                </div>

                <div class="bubbles">
                    <a id="Bbl-Symptoms" class="bubble" href="symptoms">Symptoms</a>
                    <a id="Bbl-Diseases" class="bubble" href="diseases">Diseases</a>
                    <a id="Bbl-TipsAndTricks" class="bubble" href="tipsandtricks">Tips & Tricks</a>
                </div>
                <div id="divider">
                    <a href="#breeds"><span id="arrow-down" class="fas fa-chevron-down"></span></a>
                </div>
                <br><br>
                <div id="breed_section">
                    <?php include("Breeds.php"); ?>
                </div>
            </div>
        </div>

        <?php
        include("../Master/Footer.php");
        ?>
    </div>
</body>
</html>