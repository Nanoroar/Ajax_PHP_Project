<?php
if(isset($_GET['name'])){
    echo 'Your name is ' . $_GET['name'];
}

if(isset($_POST['name'])){
    echo 'Your name is "' . $_POST['name'] .'"' ;
}






?>