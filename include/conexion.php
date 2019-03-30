 <?php
$servername = "localhost";
$username = "id6558475_carlos";
$password = "carlos1234";
$dbname = "id6558475_discos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
