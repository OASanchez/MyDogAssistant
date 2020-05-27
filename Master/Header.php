<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MyDog Virtual Assistant</title>
        
        <link rel="icon" type="image/png" href="../Master/Master_Images/MyDog_Logo.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- Multiple.js -->
        <link href="../CSS/multiple.css" rel="stylesheet">
        <script src="../Js/multiple.js"></script>

        <link rel="stylesheet" href="../CSS/Main.css">

        <script>
            var multiple = new Multiple({
                selector: '.multi-grad',
                background: 'linear-gradient(#273463, #8B4256)'
            });
        </script>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark multi-grad">
            <a class="navbar-brand" href="index.php">
                <img src="../Images/MyDog_Logo.png" class="brand-img" alt=""/>
            </a>
            <p id="#page_header" class="navbar-text" style="margin-bottom:0px; font-size:2.5rem"></p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="../ActualPages/Index.php" id="homeLink" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="../ActualPages/Symptoms.php" id="symptLink" class="nav-link">Symptoms</a></li>
                    <li class="nav-item"><a href="../ActualPages/Diseases.php" id="disLink" class="nav-link">Diseases</a></li>
                    <li class="nav-item"><a href="../ActualPages/TipsandTricks.php" id="tipsLink" class="nav-link">Tips & Tricks</a></li>
                    <li class="nav-item"><a href="../ActualPages/About.php" id="aboutLink" class="nav-link">About</a></li>
                </ul>
            </div>
        </nav>

</body>
</html>