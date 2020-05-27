<h1>Welcome to the MyDog Virtual Assistant!</h1>
This is the veterinarian virtual assistant built as a web app for our Senior Capstone Experience (CS499). This web app was written by Osvaldo Sanchez, Nicholas Mueth, Joshua Toth, and Parfait Domagni, and supervised by Dr. Suhair Amer for our last semester at Southeast Missouri State University in 2020. Despite complications arising due to quarantine, through collaboration and hard work, we have successfully banded together to form a powerful education tool sure to assist any dog owner.

Youtube Link of Video Demonstration: https://www.youtube.com/watch?v=aEgBNDlqXOc

<i>Disclaimer: This project is purely for educational and demonstration purposes, we are not doctors or licensed veterinary physicians. Please consult the proper care technicians if your dog is suffering from any serious health risks/conditions.</i>

<h2>Installing MyDog Virtual Assistant (Administration Manual)</h2>
Our client instructed us that our product should only run locally.  As such, the server must be set up before being able to properly navigate the site.  To do so, please follow these instructions:
<h4>Requirements:</h4>
<ul>
  <li>Web Server for PHP and SQL hosting (We suggest WAMP for personal use)</li>
  <li>Up-to-date web browser</li>
  <li>Database for storing information, including credentials such as username and password (local database connection is fine)</li>
  <li>Downloaded and unzipped Github folder of program, placed in www\ directory of php and sql capable web server</li>
</ul>
<h4>Installing Database:</h4>
A SQL file is provided in the SQL folder. Running this file on an updated version of MySQL will create the database needed for accessing the information. <small>(If a "collation error" is given, consider updating MySQL or removing "collation" statements)</small>
<h4>Instructions for starting web page:</h4>
<ol>
  <li>Provide hosting or Virtual Host service with path to folder (for example C:\Wamp64\www\MyDogAssistant)</li>
  <li>Edit database connections in "Master/Connection.php". Comments in code will guide you through editing file</li>
  <ul>
    An example of that code is below:
    <li>$servername = "localhost:3306";</li>
    <li>$user = "username";</li>
    <li>$pass = "password";</li>
    <li>$db = "database_name";</li>
  </ul>
  <li>Start PHP and MySQL compatible web server</li>
  <li>Ensure proper connections to database and to web server, and open web hosting link on web browser (when using localhost this could look like "localhost/CapstoneSpring2020")</li>
</ol>
<small>(If you have any questions or problems, please feel free to post an "issue" or contact us to receive help)</small>
