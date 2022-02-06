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

<h2>Running Screenshots</h2>
<h3>Home Page</h3>

![Home1](https://user-images.githubusercontent.com/55261374/152667359-93d0731f-d904-43f8-b241-6f8df4e86a74.png)

![Home2](https://user-images.githubusercontent.com/55261374/152667361-dc9f0374-7c58-456f-8c07-4e20713d82fd.png)


<h3>Symptoms Page</h3>

![Symptoms1](https://user-images.githubusercontent.com/55261374/152667394-3513921d-b625-4116-bf1e-f77197e71cc9.png)

![Symptoms2](https://user-images.githubusercontent.com/55261374/152667396-efc8e6c6-f4c6-4176-8a30-bb6e6ece0ea3.png)

<h3>Results Page</h3>

![Results1](https://user-images.githubusercontent.com/55261374/152667406-5a906f4c-c599-49d5-ae7c-d647348b76ff.png)

![Results2](https://user-images.githubusercontent.com/55261374/152667407-fa862df3-6eca-471a-99a8-51548e89f4c4.png)

<h4>Breed Specific Page</h4>

![Breed](https://user-images.githubusercontent.com/55261374/152667419-82d11290-69a9-4a9d-aedd-95a0762bd0d5.png)

<h3>Disease List</h3>

![Disease List](https://user-images.githubusercontent.com/55261374/152667452-9186ec6d-beb5-43ca-ac73-2f4b650cb80c.png)

<h3>Specific Disease</h3>

![Specific_Disease1](https://user-images.githubusercontent.com/55261374/152667459-a231d69d-1bb9-4b0a-b95f-c31362aca184.png)

![Specific_Disease2](https://user-images.githubusercontent.com/55261374/152667460-4e89bd7c-94af-470c-89d6-8ac127c15db7.png)

<h3>Tips Page</h3>

![Tips](https://user-images.githubusercontent.com/55261374/152667466-66f7ddd7-aec6-4ba3-99fd-8f6d9e1a6bd1.png)
