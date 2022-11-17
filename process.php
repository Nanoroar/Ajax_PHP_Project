<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'bootstrap.html'?>
    <title>Processor</title>
    <style>
        <?php include 'style.css'; ?>
    </style>
</head>
<body>
<?php include 'header.html'; ?>

<section class="container p-2 bg-success text-light">

<?php 
echo '<h1> PHP Processor</h1>'; 

// Connect to a Database 
$conn = mysqli_connect('localhost','root','root','ajax');


if(isset($_POST['name'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    echo 'POST: Your name is ' . $_POST['name'] ;

    $query ="INSERT INTO users(name) Values('$name')";
    if(mysqli_query($conn, $query)){
        echo 'User Added';
    }
    else echo 'Error:' . mysqli_error($conn);

}

// Check for GET variable
if(isset($_GET['name'])){
    echo 'GET: Your name is ' . $_GET['name'] ;
}


?>

</section>

<?php include 'footer.html'; ?>
</body>
</html>



