<?PHP
$servername = "localhost";
$username = "root";
$password = "team1234";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("USE ece524_proj;");
?>
