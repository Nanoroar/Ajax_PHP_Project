<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'bootstrap.html'; ?>  
    <title>Fetching Data</title>
    <style>
        <?php include 'style.css'; ?>   
    </style>
</head>
<body>
    <?php  include 'header.html'; ?>
    <main class="bg-success text-light container">
        <div id="demo"></div>
        <div class="btn btn-success border my-1" id="user">Get User</div>
        <div class="btn btn-success border my-1" id="users">Get Users</div>
    </main>

<?php include 'footer.html'; ?>  
    <script>
const demo = document.getElementById('demo');   
document.getElementById('user').addEventListener('click', getOneUser);
document.getElementById('users').addEventListener('click', getAllusers);

const xhr = new XMLHttpRequest();
function getOneUser(){

    xhr.open('GET', 'user.json', true);

    xhr.onload= function(){
        const response = JSON.parse(this.responseText);
        demo.innerText = response.id + '. ' + response.name + ' Age:'+ response.age ;
    }

    xhr.send();
}
function getAllusers(){

    xhr.open('GET', 'users.json', true);

    xhr.onload= function(){
        const users = JSON.parse(this.responseText);
        demo.innerHTML = '';
        users.forEach(function(user){

            demo.innerHTML += user.id + '. ' + user.name + ' Age:'+ user.age+ '<br/>' ;
        });
    }

    xhr.send();
}
    </script>
</body>
</html>