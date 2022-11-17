<?php

// Connect to a Database localhost
$conn = mysqli_connect('localhost','root','root','ajax');

// Connect to a Database remotehost
// $conn = mysqli_connect('sql305.epizy.com:3306','epiz_32019549','iv2FtIOpgVM1XQ','epiz_32019549_test');


//Query the database
$query ="SELECT * FROM users";


// Get result
$result = mysqli_query($conn, $query);

// Fetch Data
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($users);

?>