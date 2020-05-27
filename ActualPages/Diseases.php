<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diseases</title>
    <?php include("../Master/Header.php"); ?>
    <?php include("../Master/Connection.php"); ?>

    <style>
        .diseases{
            display:inline;
            color:black;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            margin-left:1rem;
            margin-right:1rem;
        }

        #icon{
            color:navy;
            font-size:2rem;
        }

        .disease{
            text-decoration:none;
            margin-top:.5rem;
            margin-left:1rem;
            margin-right:1rem;
            background-color:rgba(105,105,105,0.25);
            border-radius:15px;
            cursor:pointer;
            padding:.5rem 1.5rem;
            width:90%;
            border:none;
            outline:none;
            font-size:1.5rem;
            color:navy;
        }
        .disease> a{
            color:navy;
        }
    </style>
    
</head>
<body>
    <div class="diseases">    
        <?php
            $getDiseases = $conn->prepare("SELECT * FROM Diseases ORDER BY Dis_name");
            $getDiseases->execute();
            $disresult = $getDiseases->get_result();
            if($disresult->num_rows===0) exit('No rows');
        
            while($row = $disresult->fetch_assoc()){
                $dis_id = $row["Dis_id"];
                $dis_name = $row["Dis_name"];
                $dis_common = $row["Dis_common"];
                
                echo '<div class="disease">';

                if($dis_common != null){
                        echo '<a href="disease?disease_id=' . $dis_id . '" id="' . $dis_common . '">' . $dis_name . ' (' . $dis_common . ')</a>';
                } else{
                    echo '<a href="disease?disease_id=' . $dis_id . '" id="' . $dis_name . '">' . $dis_name . '</a>';

                }

                echo '</div>';
            }
        ?>
    </div>
    <?php include("../Master/Footer.php"); ?>
</body>
</html>