<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'bootstrap.html' ?> 
    <title>Document</title>
    <style>
        <?php include 'style.css' ?> 
    </style>
</head>
<body>
 <?php include 'header.html' ?>   
 <section class="container bg-success p-5 text-light " >
    <h3>Send with GET</h3>
    <form action="process.php" method="get" class="d-flex" >
        <div class="w-75">
            <input type="text" name="name" id="name1" placeholder="Name" class=" d-inline-block form-control   ">
        </div>
        <div class="w-25">
            <input type="submit" class="btn btn-success border ms-2"  value="Submit">
        </div>
    </form>
    <h3 class="mt-1">Send with POST</h3>
    <form action="process.php" method="post" class="d-flex  ">
        <div class="w-75">
            <input type="text" name="name" id="name2" placeholder="Name" class=" d-inline-block form-control   ">
        </div>
        <div class="w-25">
            <input type="submit" class="btn btn-success border ms-2"  value="Submit">
        </div>
    </form>
    <h3 class="mt-1">Send with Get & Ajax</h3>
    <form action="getname.php" method="get" class="d-flex" id="get_submit">
        <div class="w-75">
            <input type="text" name="name" id="name1" placeholder="Name" class=" d-inline-block form-control   ">
        </div>
        <div class="w-25">
            <input type="submit" class="btn btn-success border ms-2"  value="Submit">
        </div>
    </form>
    <h3 class="mt-1">Send with Post & Ajax</h3>
    <form action="getname.php" method="get" class="d-flex" id="Post_submit">
        <div class="w-75">
            <input type="text" name="name" id="name1" placeholder="Name" class=" d-inline-block form-control   ">
        </div>
        <div class="w-25">
            <input type="submit" class="btn btn-success border ms-2"  value="Submit">
        </div>
    </form>
    <div class="my-5">
        <button id="btn-getAllUsers" class="btn btn-success border">Get All Users</button>
        <p id="demo"></p>
    </div>
 </section>
 <?php include 'footer.html' ?>   
<script>
var xhr = new XMLHttpRequest();

//----------Get & Ajax-------------------
document.getElementById('get_submit').addEventListener('submit', function(e){
e.preventDefault();
const name = e.target.name.value;
xhr.open('Get', 'getname.php?name=' + name, true);

xhr.onload = function(){
document.getElementById('demo').innerText = this.responseText;
}; 

xhr.send();

});

// -----------POST & Ajax-------------------------
document.getElementById('Post_submit').addEventListener('submit', function(e){
e.preventDefault();
const name = e.target.name.value;
var params = 'name=' + name ;
xhr.open('POST', 'getname.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.onload = function(){
document.getElementById('demo').innerText = this.responseText;
}; 

xhr.send(params);

});



// -----------btn get-AllUsers --------------------
document.getElementById('btn-getAllUsers').addEventListener('click', function(){
xhr.open('Get', 'getAllUsers.php', true);

xhr.onload = function(){
    const users = JSON.parse(this.responseText);
    users.forEach(user => {
        
        document.getElementById('demo').innerHTML +=`<p>${user.id +". " + user.name}</p>`;
    });

};
xhr.send();
});
</script>

</body>
</html>