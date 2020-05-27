<!DOCTYPE html>
<html>

<head>
	<?php
        include('../Master/Header.php');
        include("../Master/Connection.php");
    ?>

    <?php
        $dis_id = $_GET['disease_id'];

        $getDiseaseInfo = $conn->prepare("SELECT * FROM diseases WHERE Dis_id=?");
        $getDiseaseInfo->bind_param("i", $dis_id);
        $getDiseaseInfo->execute();
        $disResult = $getDiseaseInfo->get_result();
        if($disResult->num_rows === 0) exit('No rows');
        while($row = $disResult->fetch_assoc()){
            $dis_id = $row["Dis_id"];
            $dis_name = $row["Dis_name"];
            $dis_common = $row["Dis_common"];
            $description = $row["Description"];
            $transmission = $row["Transmission"];
            $prevention = $row["Prevention"];
            $treatment = $row["Treatment"];
            $picture = $row["Picture"];
            $reference = $row["Reference"];
        }

        $getConnect_BD = $conn->prepare("SELECT Bre_name, connect_bd.Bre_id FROM connect_bd JOIN breeds on breeds.bre_id = connect_bd.bre_id and Dis_id = ?");
        $getConnect_BD->bind_param("i", $dis_id);
        $getConnect_BD->execute();
        $connect_bd = $getConnect_BD->get_result();
    ?>
    <link rel="stylesheet" type="text/css" href="../CSS/Disease.css">
    
</head>

<body>
    <!-- Wrapping everything in the paw print bg, but then also including background for content-->
    <div class="bg">
        <div class="wbg">
            <!-- BREAD CRUMBS UPDATE LINKS WHEN READY-->
            <ul>
                <li class="breadcrumbs-item">
                    <a href="diseases#<?php if($dis_common != null) echo $dis_common; else echo $dis_name;?>" class="breadcrumbs-link">Diseases</a>
                </li>
                <li class="breadcrumbs-item">
                    <a class="breadcrumbs-link breadcrumbs-link--active"><?php echo $dis_name; if($dis_common!=null){ echo ' (' . $dis_common . ')';}?></a>
    </li>
            </ul>
        <br>
            <div class="grid-container">
                <div class="left">
                    <div class="gImage">
                        <!-- IMAGE OF CLICKED DISEASE -->
                        <div class="dContainer">
                            <img class="clicked-image" src="<?php echo $picture; ?>" alt="<?php echo $reference; ?>">
                        </div>
                    </div>
                    <br>
                    <h3 style="margin: 0 1.5rem">Jump To:</h3>
                        <ul id="jumpTo">
                            <li><a href="#transmission">Transmission</a></li>
                            <li><a href="#prevention">Prevention</a></li>
                            <li><a href="#treatment">Treatment</a></li>
                            <br>
                        </ul>
                    <br>
                    <?php
                        if($connect_bd->num_rows > 0){
                            echo '<div class="gRiskList">';
                            echo '<h3>At Risk Breeds:</h3>';
                            echo '<ul>';
                            while($row = $connect_bd->fetch_assoc()){
                                $bre_id = $row["Bre_id"];
                                $bre_name = $row["Bre_name"];
                                echo '<li><a href="breed?breed_id=' . $bre_id . '">' . $bre_name . '</a></li>';
                            }
                            echo '</ul></div>';
                        }
                    ?>
                </div>

                <div class="right">
                
                    <div class="gDisease">
                        <h1><?php echo $dis_name; if($dis_common!=null){ echo '<br><small>(' . $dis_common . ')</small>';}?></h1>
                        <p><?php echo $description; ?></p>
                        <br>
                    </div>
                    
                    <div class="gTransmission" id="transmission">
                        <h2> Transmission </h2>
                        <p><?php echo $transmission; ?></p>
                    </div><br>
                    <div class="gPrevention" id="prevention">
                        <h2> Prevention </h2>
                        <p><?php echo $prevention; ?></p>
                        
                    </div><br>
                    <div class="gTreatment" id="treatment">
                        <h2> Treatment </h2>
                        <p><?php echo $treatment; ?></p>

                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</body>
	<?php
	    include('../Master/Footer.php');
	?>
</html>