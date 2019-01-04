To execute the Project:

We first need to import the database before executing the project.
The database is stored in the database directory.
If your database has a username and password to connect then you will have to change the open db.php and insert the username and password into the connection string as follows
$con = mysqli_connect("localhost","username","password","events"); 
 
When executing we execute the project in any browser, we execute on localhost/sji_events

Dummy data has been inserted containing 2 categories(Football & Cricket) and 2 events(Fifa World Cup & ISL).
