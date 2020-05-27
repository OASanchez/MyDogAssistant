<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Symptoms</title>

    <?php include("../Master/Header.php"); ?>
    <?php include("../Master/Connection.php"); ?>
    <script src="../Js/formAttributes.js"></script>
    <link rel="stylesheet" href="../CSS/SymptomsPage.css">

    <script>
        var page_header = document.getElementById("#page_header");
        page_header.innerText = "Symptoms";
    </script>

</head>

<body>
    <div id="heading">
        <h1>Symptoms page</h1>
        <h4>Fill out the following information and let our virtual assistant do the rest!</h4>
    </div>
    <br>
    <div class="container">
        <form name="symptomForm" action="results" onsubmit="return formValidation()" method="POST">
            <div class="symptom_input_container">
                <div class="row breed_dropdown_container">

                    <!--Breed dropdown-->
                    <label for="breedDropdownList" class="head">Select your breed:</label>
                    <select id="breedDropdownList" name="breed_code" class="dropdown-content" placeholder="Dog Breed" required>
                        <option selected="selected"></option>
                        <?php
                        if ($_GET['breed_id'] != null) 
                        {
                            $breed_id = $_GET['breed_id'];
                        }

                        #SQL
                        $sql_query = "SELECT * FROM breeds ORDER BY Bre_id";
                        $result = $conn->query($sql_query);

                        $i = 0;
                        if ($result->num_rows > 0) 
                        {
                            while ($row = $result->fetch_assoc()) 
                            {
                                if ($row["Bre_id"] == $breed_id) 
                                {
                                    echo '<option selected="selected" value=' . $row["Bre_code"] . '>' . $row["Bre_name"] . '</option>';
                                } 
                                else 
                                {
                                    echo '<option value=' . $row["Bre_code"] . '>' . $row["Bre_name"] . '</option>';
                                }
                            }
                        } 
                        else 
                        {
                            echo "ERROR";
                        }
                        ?>
                    </select>
                </div>
                <div class="row num_input_container">
                    <!--Age-->
                    <div id="age" class="row">
                        <label for="ageIncrementor" class="head">Dog Age: </label>
                        <div name="ageIncrementor">
                            <button id="ageDec" class="step_left multi-grad" type='button'><i class="fas fa-minus"></i></button>
                            <input name="age" type="text" id="age_textbox" class="num_input" value="0" required>
                            <button id="ageInc" class="step_right multi-grad" type='button'><i class="fas fa-plus"></i></button>
                        </div>
                    </div>

                    <!--Weight-->
                    <div id="weight" class="row">
                        <label for="weightTextBox" class="head">Dog Weight: </label>
                        <div name="weightTextBox">
                            <input name="weight" type="text" class="num_input" placeholder="0" required><span style="margin-left:10px;vertical-align:middle;font-size:1.5rem;">lbs</span>
                        </div>
                    </div>
                </div>

                <br>

                <hr>

                <br>

                <h3>Select the symptoms your dog is experiencing <br><small>(Separated by symptom area)</small></h3>
                
                <!--Symptoms-->
                <div id="symptoms">
                    <?php
                    $getSymptoms = $conn->prepare("SELECT * FROM SYMPTOMS ORDER BY Sym_area, Sym_name");
                    $getSymptoms->execute();
                    $symptomResult = $getSymptoms->get_result();
                    if ($symptomResult->num_rows === 0) exit('No rows');

                    $temp_area = "null";
                    $count = 0;

                    $area_row = [];
                    $symptoms = array();
                    $symptom_row = array();

                    while ($row = $symptomResult->fetch_assoc()) {
                        $sym_id = $row["Sym_id"];
                        $sym_name = $row["Sym_name"];
                        $sym_area = $row["Sym_area"];
                        if ($temp_area != $sym_area) {
                            $temp_area = $sym_area;

                            if ($count < 3) {
                                array_push($area_row, $sym_area);
                                $count++;
                            } else {

                                createNewRow($area_row);
                                $area_row = [];
                                array_push($area_row, $sym_area);

                                createSymptomRows($symptoms);
                                $symptoms = [];
                                $count = 1;
                            }
                        }
                        array_push($symptoms, array($sym_area, $sym_name));
                    }

                    createNewRow($area_row);
                    createSymptomRows($symptoms);

                    function createNewRow($area_row)
                    {
                        echo '<div class="row area_row">';
                        foreach ($area_row as $area) {
                            echo '<div class="collapsible symptom_category multi-grad col"><h4>' . ucfirst($area) . '</h4></div>';
                        }
                        echo '</div>';
                    }

                    function createSymptomRows($symptoms)
                    {
                        $temp_row = null;
                        echo '<div>';
                        foreach ($symptoms as $sym_row) 
                        {
                            if ($temp_row[0] != $sym_row[0]) 
                            {
                                $temp_row = $sym_row;
                                echo '</div><div class="row symptoms" id="' . ucfirst($sym_row[0]) . '">';
                                echo '<div class="col-4 symptom"><label class="checkmark-label">';
                                echo '<input type="checkbox" name="symptoms[]" value="' . $sym_row[1] . '"><span class="checkmark"></span></input>' . $sym_row[1] . '</label>';
                                echo '</div>';
                            } 
                            else 
                            {
                                echo '<div class="col-4 symptom"><label class="checkmark-label">';
                                echo '<input type="checkbox" name="symptoms[]" value="' . $sym_row[1] . '"><span class="checkmark"></span></input>' . $sym_row[1] . '</label>';
                                echo '</div>';
                            }
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
                <br>
                <hr>
                <div class="submit_row">
                    <input type="submit" class="submit_btn" value="Submit">
                </div>
                <br>
                <h5>Checked Symptoms</h5>
                <ul class="display_checked" id="checked_symptoms">
                </ul>
            </div>
    </div>
    </form>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var cont = document.getElementsByClassName("symptoms");
        var i;

        for (i = 0; i < coll.length; i++) 
        {
            coll[i].addEventListener("click", function() 
            {
                var current = document.getElementsByClassName("active");
                if (current.length > 0) 
                {
                    current[0].className = current[0].className.replace(" active", "");
                }
                var sym_area = this.innerText;
                for (var j = 0; j < cont.length; j++) 
                {
                    if (cont[j].id == sym_area) 
                    {
                        this.classList.toggle("active");
                        cont[j].style.maxHeight = cont[j].scrollHeight + "px";
                    } 

                    else 
                    {
                        cont[j].style.maxHeight = null;
                    }
                }
            });
        }

        var selected = [];
        $(':checkbox').change(function() 
        {
            if (selected.includes(this.value)) 
            {
                var index = selected.indexOf(this.value);
                selected.splice(index, 1);
            } 
            else 
            {
                selected.push(this.value);
            }
            if (selected != null) 
            {
                $("#checked_symptoms").empty();
                for (var x = 0; x < selected.length; x++) 
                {
                    $("#checked_symptoms").append("<li>" + selected[x] + "</li>");
                }
            }
        });

        function formValidation() 
        {
            if (selected.length > 0) 
            {
                return true;
            } 
            else 
            {
                alert("ERROR! Please selected some symptoms.");
                return false;
            }
        }
    </script>

    <?php include("../Master/Footer.php");?>
</body>
</html>