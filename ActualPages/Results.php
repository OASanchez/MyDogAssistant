<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include("../Master/Header.php");
        include("../Master/Connection.php");
    ?>
    <style>
        body{
            background-color:white;
        }
        .page-container{
            color:black;
            font-size:.75rem;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        h1{
            text-align:center;
        }
        h3{
            font-size:1.25rem;
        }
        h5{
            font-size:1rem;
        }
        th{
            font-size:1.5rem;
        }
        #diseaseCol{
            width:70%;
        }
        .dis{
            border-radius:15px;
        }
        .dis>td>a{
            text-decoration:underline;
        }
        .dis>td>a:hover{
            color: rgba(105,105,105,0.5);
        }

        .results{
            display:flex;
            justify-content:center;
            background-color: rgba(66, 101, 255, 0.3);
            padding:2rem;
            border-radius:25px;
            margin:2rem auto;
            width:75%;
        }

        .results>div>ul>li{
            font-size:1rem;
        }

        .summary{
            width:75%;
            margin-left:auto;
            margin-right:auto;
            padding:15px;
            justify-content:center;
            color:var(--secondary);
            border-radius:25px;
            background-color: rgba(66, 101, 255, 0.3);
        }

        .weight{
            display:flex;
            text-align:center;
            justify-content:center;
        }

        .summary>h5>a{
            font-style:oblique;
            color:var(--secondary);
            text-decoration:underline;
        }

        .summary>h5>a:hover{
            font-style:oblique;
            color:grey;
            text-decoration:underline;
        }
    </style>

    <script>
        var page_header = document.getElementById("#page_header");
        page_header.innerText = "Results";
    </script>
</head>

<body>
    <div class="page-container">
        <?php
            //INCLUDE STATEMENTS
            if($_POST['symptoms'] == null){
                $symptoms==null;
            } else {
                $symptoms = $_POST['symptoms'];
            }

            $breed_code = $_POST['breed_code'];
            $age = $_POST['age'];
            $weight=$_POST['weight'];

            //FINAL RESULTS ARRAY INIT
            $results = array();

            $getBreedInfo = $conn->prepare("SELECT * FROM Breeds WHERE Bre_code = ?");
            $getBreedInfo->bind_param("s", $breed_code);
            $getBreedInfo->execute();
            $breedResult = $getBreedInfo->get_result();
            if($breedResult->num_rows===0) exit('No rows');
            while($row = $breedResult->fetch_assoc()){
                $bre_id = $row["Bre_id"];
                $bre_name = $row["Bre_name"];
                $bre_code = $row["Bre_code"];
                $bre_age = $row["age"];
                $bre_weight = $row["weight"];
                $max_wgt = $bre_weight+($bre_weight*0.2);
                $min_wgt = $bre_weight-($bre_weight*0.2);
            }

            $getConnect_DS = $conn->prepare("SELECT Dis_name, Sym_name FROM connect_ds JOIN diseases on diseases.dis_id = connect_ds.dis_id JOIN symptoms on symptoms.sym_id = connect_ds.sym_id");
            $getConnect_DS->execute();
            $connect_ds = $getConnect_DS->get_result();
            if($connect_ds->num_rows === 0) exit('No rows');
        
            while($row = $connect_ds->fetch_assoc()){
                $dis_name = $row["Dis_name"];
                $sym_name = $row["Sym_name"];
            }

            $getConnect_BD = $conn->prepare("SELECT diseases.dis_name, connect_bd.dis_id FROM connect_bd LEFT JOIN diseases on diseases.dis_id = connect_bd.dis_id WHERE Bre_id = ?");
            $getConnect_BD->bind_param("i", $bre_id);
            $getConnect_BD->execute();
            $connect_bd = $getConnect_BD->get_result();
            if($connect_bd->num_rows>0){
                $susceptibleDiseases = [];
                while($row = $connect_bd->fetch_assoc()){
                    array_push($susceptibleDiseases, $row["dis_name"]);
                }
            } 

            $sym_id_arr = array();
            $in = str_repeat('?,', count($symptoms)-1).'?';
            $sql = "SELECT Sym_id FROM symptoms WHERE Sym_name IN ($in)";
            $stmt = $conn->prepare($sql);
            $types = str_repeat('s', count($symptoms));
            $stmt->bind_param($types, ...$symptoms);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                array_push($sym_id_arr, $row["Sym_id"]);
            }

            $sym_data = array();
            $inSym = str_repeat('?,', count($sym_id_arr)-1).'?';
            $symSql = "SELECT Dis_name, Dis_common, COUNT(*) FROM connect_ds JOIN diseases on diseases.dis_id = connect_ds.dis_id JOIN symptoms on symptoms.sym_id = connect_ds.sym_id WHERE connect_ds.sym_id IN ($inSym) GROUP BY Dis_name ORDER BY COUNT(*) DESC";
            $symStmt = $conn->prepare($symSql);
            $types = str_repeat('s', count($sym_id_arr));
            $symStmt->bind_param($types, ...$sym_id_arr);
            $symStmt->execute();
            $symResult = $symStmt->get_result();

            while($row = $symResult->fetch_assoc()){
                if($row["Dis_common"]==null){
                    $sym_data += [$row["Dis_name"] => $row["COUNT(*)"]];

                } else{
                    $sym_data+=[$row["Dis_common"] => $row["COUNT(*)"]];
                }
            }

            

            $diseaseSymptomCount = array();
            $symptomCount = $conn->prepare("SELECT Dis_name, Dis_common, COUNT(*)
            FROM connect_ds JOIN diseases on diseases.dis_id = connect_ds.dis_id
            GROUP BY dis_name");
            $symptomCount->execute();
            $sympCount = $symptomCount->get_result();
            if($sympCount->num_rows === 0) exit('No rows');
        
            while($row = $sympCount->fetch_assoc()){
                if($row["Dis_common"] == null){
                    $dis_name = $row["Dis_name"];
                    $sym_count = $row["COUNT(*)"];
                    $diseaseSymptomCount += [$dis_name => $sym_count];
                }else{
                    $dis_name = $row["Dis_common"];
                    $sym_count = $row["COUNT(*)"];
                    $diseaseSymptomCount += [$dis_name => $sym_count];
                }
            }

            function isSusceptible($disease){
                global $susceptibleDiseases;
                if($susceptibleDiseases!=null){
                    if(in_array($disease, $susceptibleDiseases)){
                        return true;
                    }
                }
                
            }

            // FUNCTIONS
            // Check for Weight Issues
            function weightCheck(){
                global $weight, $max_wgt, $min_wgt, $bre_name;
                if($weight>$max_wgt){
                    echo '<h3 class="bg-danger" style="color:white; padding:10px; border-radius:10px;">Your dog weighs '.$weight.' lbs! They may be suffering from obesity!<small> - A healthy weight for your dog is between '.$min_wgt. ' and '.$max_wgt.' lbs</small>';
                    if($bre_name=="Dachshund"){
                        echo '<br><strong>YOUR DOG\'S BREED ('.$bre_name.') CAN SUFFER SERIOUS DAMAGE FROM OBESITY! Go visit the vet ASAP!</strong>';
                    }
                    echo '</h3>';
                }  
                else if($weight>=$min_wgt && $weight<=$max_wgt){
                    echo '<h3 class="bg-success" style="color:white; padding:10px; border-radius:10px;">Your dog weighs '.$weight.' lbs! They are a healthy weight, keep it up!</h2>';
                }
                else{
                    echo '<h3 class="bg-warning" style="color:white; padding:10px; border-radius:10px;">Your dog weighs '.$weight.' lbs! They may be underweight!<small> - A healthy weight for your dog is between '.$min_wgt. ' and '.$max_wgt.' lbs</small></h3>';
                }                
            }

            // Check for Blastomycosis
            function BlastomycosisCheck(){
                global $bre_weight;
                if($bre_weight>55){
                    return true;
                }
            }

            // Check for Worms
            function wormCheck(){
                global $age;
                if($age<5){
                    return true;
                }
            }

            // Check for Pythiosis
            function PythiosisCheck(){
                global $age;
                if($age<5){
                    return true;
                }
            }

            // Check for Von Willie's
            function VonWillebrandSeverityCheck(){
                global $bre_id;
                //Shetland Sheepdog (27)
                if($bre_id==27){
                    return 1;
                } 
                //German Shorthaired Pointers (15)
                elseif($bre_id == 15){
                    return 2;
                }
                //Bernese (3), Dachshunds (9), Dobermans (10), German Shepherds (14), Golden Retrievers (16), Corgis (22), Poodles (24)
                elseif ($bre_id == 9 || $bre_id == 3 || $bre_id == 10 || $bre_id == 14 || $bre_id == 22 || $bre_id == 24 || $bre_id == 16) {
                    return 3;
                }
                else{
                    return 0;
                }
            }

            // Check Disease for Symptom Matches
            function symptomCheck(){
                global $symptoms, $sym_data, $diseaseSymptomCount, $susceptibleDiseases;
                $symLevel = 0;
                $i = 0;
                
                // For each symptom, add to symptom count
                foreach($sym_data as $ds=>$ct){
                    // For each symptom related to a disease, send a count
                    // Example: Aspergillosis -> 6 symptoms
                    foreach($diseaseSymptomCount as $dis=>$sym_ct){
                        // Send both to displayDiseaseChance
                            // Disease as $ds
                            // Count of shown symptoms as $ct
                            // Count of symptoms disease has as $sym_count
                        if($dis == $ds){
                            displayDiseaseChance($ds, $ct, $sym_ct);
                        }
                    }
                }
            }

            function displayDiseaseChance($disease, $count, $sym_count){

                // Global variables
                global $results;
                
                // If dog breed is more susceptible to disease, disease percentage multiplier is 100, otherwise 75.
                // Example: if disease = Rocky Mountain Fever && breed = German Shepherd, multiplier is 100
                if(isSusceptible($disease)==true){
                    $pct = ($count/$sym_count)*100;
                } else {
                    $pct = ($count/$sym_count)*75;
                }

                /*
                Modifiers for disease susceptibility due to age or weight
                */

                if(wormCheck()==true){
                    // If dogs age is less than 5, then susceptibility to worms is increased.
                    // If the current disease being analyzed is a worm type, raise the percentage for it by 10
                    if($disease == 'Heartworm' || $disease == 'Hookworm' || $disease == 'Ringworm' || $disease == 'Tapeworm' || $disease == 'Roundworm' || $disease == 'Pork Roundworm' || $disease == 'Whipworm'){
                        if($pct<90) $pct+=10;
                    }
                }
                if(PythiosisCheck() == true){
                    // If dogs age is less than 5, susceptibility to pythiosis is increased.
                    // If current disease being analyzed is pythiosis, raise percentage for it by 10
                    if($disease == 'Pythiosis'){
                        if($pct<90) $pct+=10;
                    }
                }
                if(BlastomycosisCheck() == true){
                    // If dogs weight average is over 55lbs, they are more susceptible to blastomycosis
                    // If current disease being analyzed is blastomycosis, raise percentage for it by 10
                    if($disease == 'Blastomycosis'){
                        if($pct<90) $pct+=10;
                    }
                }

                // Modifier for susceptibility to von willebrand's disease
                // Check for the severity level of Von Willebrand's Disease
                if($disease=='Von Willebrand\'s Disease'){
                    switch(VonWillebrandSeverityCheck()){
                        case 1:
                            $pct+=40;
                            break;
                        case 2:
                            $pct = $pct+30;
                            break;
                        case 3:
                            $pct+=20;
                            break;
                        case 0:
                            break;
                        }
                }

                // If percentage is over 100%, lower it to 100%
                // Rare chance that percentage reaches over 100%
                if($pct>100){
                    $pct = 100;
                }
                array_push($results, array($disease, round($pct)));
                
            }
        ?>

        <h1>RESULTS</h1>
        <div class="summary">
            <h2 style="text-align:center">Summary:</h2><br>
            <div  class="bg-info" style="color:white; padding:10px; border-radius:10px; width:100%;margin-bottom:2rem;">
                <?php
                echo '<h3>Breed: '.$bre_name.'</h3><h3>Age: '.$age.' years old</h3>';?>
            </div>
            <div class="weight"><?php weightCheck(); ?></div>
            <?php 
            // Check for severity of specific diseases
                if(wormCheck()==true){
                    echo '<h5 style="padding:10px;">Your dog\'s age makes them more susceptible to worms.</h5>';
                }
                if(PythiosisCheck() == true){
                    echo '<h5 style="padding:10px;">Your dog\'s age makes them more susceptible to <a href="diseases#Pythiosis">Pythiosis</a>.</h5>';
                }
                if(BlastomycosisCheck() == true){
                    echo '<h5 style="padding:10px;">Your dog\'s average weight makes them more susceptible to <a href="diseases#Blastomycosis">Blastomycosis</a>.</h5>';
                }
                switch(VonWillebrandSeverityCheck()){
                    case 1:
                        echo '<h5 style="padding:10px;">Your dog\'s breed makes them more susceptible to <a href="diseases#Von%20Willebrand\'s%20Disease">Von Willebrand\'s Disease</a>.</h5>';
                        break;
                    case 2:
                        echo '<h5 style="padding:10px;">Your dog\'s breed makes them more susceptible to <a href="diseases#Von%20Willebrand\'s%20Disease">Von Willebrand\'s Disease</a>.</h5>';
                        break;
                    case 3:
                        echo '<h5 style="padding:10px;">Your dog\'s breed makes them more susceptible to <a href="diseases#Von%20Willebrand\'s%20Disease">Von Willebrand\'s Disease</a>.</h5>';
                        break;
                    case 0:
                        break;
                }
            ?>
        </div>

        <div class="results row">
            <div class="col-6">
                <h3>These are the symptoms your dog is experiencing:</h3>
                <ul>
                    <?php 
                        foreach($symptoms as $selected){
                            echo '<li>'.$selected.'</li>';
                    }
                    ?>
                </ul>
            </div>

            <div class="col-6">
                <h3>These are the diseases we think your dog might have:</h3>
                    <?php
                        symptomCheck();
                        uasort($results, function($a, $b){
                            return $b[1] <=> $a[1];
                        });
                        echo '<table><tr><th id="diseaseCol">Disease</th><th id="chanceCol">Chances</th></tr>';
                        foreach($results as $rows){
                            if($rows[1]>=75){                                
                                echo '<tr class="bg-danger dis" style="font-size:1.5rem;"><td><a style="color:white;" href="diseases#'.$rows[0].'">'.$rows[0].'</a></td><td>'.$rows[1].'% chance</td></tr>';
                            } elseif ($rows[1]>=50) {
                                echo '<tr class="bg-warning dis" style="font-size:1.25rem;"><td><a style="color:white;" href="diseases#'.$rows[0].'">'.$rows[0].'</a></td><td>'.$rows[1].'% chance</td></tr>';
                            } elseif($rows[1]>=30){
                                echo '<tr class="dis" style="font-size:1rem;"><td><a href="diseases#'.$rows[0].'">'.$rows[0].'</a></td><td>'.$rows[1].'% chance</td></tr>';
                            } elseif($rows[1]>=15){
                                echo '<tr style="font-size:0.75rem;" class="dis"><td><a href="diseases#'.$rows[0].'">'.$rows[0].'</a></td><td>'.$rows[1].'% chance</td></tr>';   
                            }else{
                                echo "<tr><td></td><td></td></tr>";
                            }
                        }
                        echo '</table>';
                    ?>
            </div>
        </div>
    </div>
    <?php include("../Master/Footer.php");?>
</body>
</html>