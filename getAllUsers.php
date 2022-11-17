<?php

// Connect to a Database 
$conn = mysqli_connect('localhost','root','root','ajax');


//Query the database
$query ="SELECT * FROM users";


// Get result
$result = mysqli_query($conn, $query);

// Fetch Data
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($users);

?>