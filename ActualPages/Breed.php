<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include("../Master/Header.php");
        include("../Master/Connection.php");
    ?>

    <?php
        $breed_id = $_GET['breed_id'];
        $getBreedInfo = $conn->prepare("SELECT * FROM Breeds WHERE Bre_id=?");
        $getBreedInfo->bind_param("i", $breed_id);
        $getBreedInfo->execute();
        $result = $getBreedInfo->get_result();
        if($result->num_rows===0) exit('No rows');
        while($row = $result->fetch_assoc()){
            $id = $row["Bre_id"];
            $name = $row["Bre_name"];
            $code = $row["Bre_code"];
            $imgSrc = $row["image"];
            $age = $row["age"];
            $weight = $row["weight"];
            $description = $row["description"];
        }

        $getConnect_BD = $conn->prepare("SELECT Dis_name, connect_bd.Dis_id FROM connect_bd JOIN diseases on diseases.dis_id = connect_bd.dis_id and Bre_id = ?");
        $getConnect_BD->bind_param("i", $breed_id);
        $getConnect_BD->execute();
        $connect_bd = $getConnect_BD->get_result();        
    ?>

    <style>
        .page-container{
            margin-left: 10vw;
            margin-right:10vw;
        }

        #image_container{
            position:relative;
            height: 30rem;
            width:10rem;
            text-align:right;
            overflow:hidden;
            padding-right:2rem;
        }

        #image{
            height:100%;
            width:100%;
            border-radius: 25px;
            object-fit:cover;
        }


        #divName, #name{
            color:black;

            font-size:4rem;            
        }

        #age{
            color:black;

            font-size:1.5rem;
        }
        #weight{
            color:black;

            font-size:1.5rem;
        }

        #description{
            color:black;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size:.8rem;
        }

        .disease_row{
            display:block;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>

    <script> 
        var symptomLink = document.getElementById("symptLink");
        symptomLink.href="symptoms?breed_id=<?php echo $breed_id; ?>";
    </script>
    
</head>

<body>
    <div class="page-container">
        <br>
        <div class="row" id="top">
            <div class="col-lg-6" id="image_container">
                <img id="image" src="..<?php echo $imgSrc; ?>">
            </div>
            <div class="col-lg-6">
                <div class="row" id="divName"><h1 id="name"><?php echo $name; ?></h1></div>
                <div class="row" id="ageweight">
                    <div class="col-lg-6 p-0"><h3 id="age">Age range: <?php echo $age-2, ' - ', $age+1; ?></h3></div>
                    <div class="col-lg-6 p-0"><h3 id="weight">Weight range: <?php echo $weight-($weight*0.2), ' - ', $weight+($weight*0.2); ?> lbs</h3></div>
                </div>
                <hr>
                <div class="row">
                    <p id="description"><?php echo $description; ?></p>
                    <i id="description">(All information collected from <a href="https://www.akc.org" target="_blank"> akc.org </a>)</i>
                </div>
                <div class="row">
                    <div>
                        <?php
                            if($connect_bd->num_rows > 0)
                            {
                                echo '<hr><h5 class="disease_row">'.$name.'s are susceptible to the following diseases:</h5>';
                            }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <table>
                    <?php
                        while($row = $connect_bd->fetch_assoc())
                        {
                            $dis_name = $row["Dis_name"];
                            $dis_id = $row["Dis_id"];
                            echo '<tr><td><a class="disease_row" href="disease?disease_id='.$dis_id.'">'.$dis_name.'</a></td></tr>';
                        }
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include("../Master/Footer.php");?>
</body>
</html>