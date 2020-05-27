<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disclaimer</title>
    
    <?php include("Header.php");?>
    <script>
        var page_header = document.getElementById("#page_header");
        page_header.innerText = "Disclaimer";
    </script>
    <style>
        .content{
            height:100vh;
        }
        .box{
            margin:2rem auto;

            justify-content:center;
            align-items:center;

            padding: 1rem 3rem 3rem;
            width: 75%;
            background-color:lightblue;
            border-radius:25px;
        }
        h1{
            font-size:5rem;
            text-align:center;
            background:red;
            color:white;
            border-radius:25px;
        }
        #text{
            color:red;
            font-size: 1.25rem;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="box">
        <div>
            <h1>WE ARE NOT VETERINARIANS!</h1>
        </div>
        <br>
        <div>
        <p id="text">This project is purely for educational and demonstration purposes, we are not doctors or licensed veterinary physicians.
        Please consult the proper care technicians if your dog is suffering from any serious health risks/conditions.</p>
        </div>
        </div>
    </div>
    
    
    <?php include("Footer.php");?>
</body>
</html>