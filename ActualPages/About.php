<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../CSS/About.css">
    <?php
    include('../Master/Header.php');
    ?>
    <script>
        var page_header = document.getElementById("#page_header");
        page_header.innerText = "About Us";
    </script>
</head>

<body>
    <!-- Overall Grid, every person gets their column -->
    <div class="grid-container">
        <div class="Osvaldo">
            <h2> Osvaldo Sanchez </h2>
            <img class="cover-photo" src="../Images/About_Images/Ozzy_Cover.jpg" alt="Osvaldo Sanchez Cover Photo">
            <p>
                <span id="b">Class:</span> Senior at SEMO
                <br>
                <span id="b">Degree:</span> CIS Bachelors
                <br>
                <span id="b">Goals:</span>
                <br>
                I wish to start as a Junior Developer working with OOP languages, like Java, and ultimately work as a Project Manager.
                <br>
                <span id="b">My GitHub Link:</span> <a href="https://github.com/OASanchez" target="_blank"> https://github.com/OASanchez </a>
            </p>
        </div>
        <div class="Nick">
            <h2> Nick Mueth </h2>
            <img class="cover-photo" src="../Images/About_Images/Nick_Cover.jpg" alt="Nicholas Mueth Cover Photo">
            <p>
                <span id="b">Class:</span> Senior at SEMO
                <br>
                <span id="b">Degree:</span> CIS Bachelors
                <br>
                <span id="b">Goals:</span>
                <br>
                After finishing school, I am getting hired by a local family-owned convenience store chain to fill a brand new position in their IT Department.
                <br>
                <span id="b">My GitHub Link:</span> <a href="https://github.com/NickMueth" target="_blank"> https://github.com/NickMueth </a>
            </p>
        </div>
        <div class="Josh">
            <h2> Joshua Toth </h2>
            <img class="cover-photo" src="../Images/About_Images/Josh_Cover.jpg" alt="Joshua Toth Cover Photo">
            <p>
                <span id="b">Class:</span> Senior at SEMO
                <br>
                <span id="b">Degree:</span> CIS Bachelors
                <br>
                <span id="b">Goals:</span>
                <br>
                I want to work in a business analysis position to better serve business on what their data could do for them and what it means.
                <br>
                <span id="b">My GitHub Link:</span> <a href="https://github.com/JcmToth" target="_blank"> https://github.com/JcmToth </a>
            </p>
        </div>
        <div class="Parfait">
            <h2> Parfait Domagni </h2>
            <img class="cover-photo" src="../Images/About_Images/Parfait_Cover.jpg" alt="Parfait Domagni Cover Photo">
            <p>
                <span id="b">Class:</span> Senior at SEMO
                <br>
                <span id="b">Degree:</span> CIS Bachelors
                <br>
                <span id="b">Goals:</span>
                <br>
                Hello, my name is Parfait Domagni.  After graduating in the fall of 2020, I would like to work as a software developer. 
                <br>
                <span id="b">My GitHub Link:</span> <br><a href="" target="_blank"> In Progress </a>
            </p>
        </div>
    </div>

    <div class="sources">
        <h1> Information Sources </h1>
        <ul style="list-style-type:none">
        <li> <a href="https://www.vcahospitals.com"> https://www.vcahospitals.com </a> </li>
        <li> <a href="https://www.merckvetmanual.com"> https://www.merckvetmanual.com </a> </li>
        <li> <a href="https://www.wagwalking.com"> https://www.wagwalking.com </a> </li>
        </ul>
        <br>
        <h1> Image Sources </h1>
        <ul style="list-style-type:none">
        <li> <a href="https://www.pixabay.com"> https://www.pixabay.com </a> </li>
        <li> <a href="https://www.pexels.com"> https://www.pexels.com </a> </li>
        <li> <a href="https://www.unsplash.com"> https://www.unsplash.com </a> </li>
        <li> <a href="https://www.vcahospitals.com"> https://www.vcahospitals.com </a> </li>
        </ul>
    </div>
    <h1> Legal Disclaimer </h1>
    <h2 class="Disclaimer_Txt"> This project is purely for educational and demonstration purposes, we are not doctors or licensed veterinary physicians.
        Please consult the proper care technicians if your dog is suffering from any serious health risks/conditions.
    </h2>
</body>
<footer>
    <?php
    include('../Master/Footer.php');
    ?>
</footer>

</html>