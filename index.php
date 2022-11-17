<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<title>Ajax = XMLHttpRequest</title>
<style>
/* Included CSS Style */
<?php include 'style.css'; ?>  
</style>
</head>

<body>
<!-- Header -->
<?php include "header.html"  ?>






<section class="container py-2  bg-success text-light">
<h2>XHR Events</h2>
<ol >
<li class="">onload</li>
<li class="">onreadystatechange</li>
<li class="">onprogress</li>
<li class="">onerror</li>
</ol>
</section>





<section class="container shadow bg-success text-light">
<h3 class="  w-100 pt-2 mb-1">Sample Text</h3>
<p id="sampleText" class="mb-0"></p>
<button class="btn btn-success border my-1" id="btn-get-text">Get Text</button>
<button class="btn btn-success border my-1" id="btn_show_code">Show Code</button>
<textarea name="textarea" id="textarea" cols="" rows="25" class="hide w-100 " readonly>
const sampleText = document.getElementById('sampleText');
const btn_get_text = document.getElementById('btn-get-text');

btn_get_text.addEventListener('click', getText);

// Create XHR Object
var xhr = new XMLHttpRequest();

function getText(){
	
	//Open - request method , url/file, async?
	xhr.open('get', 'sample.txt', true);
	
	xhr.onload = function() {
		if(this.status == 200 && btn_get_text.textContent === 'Get Text'){
			sampleText.innerHTML = this.responseText;
			btn_get_text.textContent = 'Hide Text';
			console.log(this.responseText);
		}else{
			btn_get_text.textContent = 'Get Text';
			sampleText.innerHTML = ''; 
		}
	};
	
	xhr.send();
	
}
</textarea>
<div class="mb-0 py-4">
<h3 class="mb-0">XMLHttpRequest has Readystates</h3>
<ol class="m-0 " start="0">
<li class="">Requset not initialized</li>
<li class="">Sever connection established</li>
<li class="">Request received</li>
<li class="">Processing request</li>
<li class="">Request is finshed and respnse in ready</li>
</ol>
<p>Property that is used to get the Readystates is <strong>xhr.onreadystatechange</strong></p>
<h5>Code example:</h5>
<iframe src="ajaxCode.html" frameborder="0" class="w-100"></iframe>

</div>
</section>

<!-- Footer -->
<?php include "footer.html" ?>

<!-- JS Script starts here  -->
<script>
const sampleText = document.getElementById('sampleText');
const btn_get_text = document.getElementById('btn-get-text');
const btn_show_code = document.getElementById('btn_show_code');
const text_area = document.getElementById('textarea');


btn_show_code.addEventListener('click', () => {
	text_area.classList.toggle('hide');
	if (btn_show_code.textContent === 'Show Code') {
		btn_show_code.textContent = 'Hide Code'
	} else {
		btn_show_code.textContent = 'Show Code';
	}
});
btn_get_text.addEventListener('click', getText);

// Create XHR Object
var xhr = new XMLHttpRequest();

function getText() {
	console.log('clicked')
	
	//Open - request method , url/file, async?
	xhr.open('get','sample.txt', true);
	console.log('ReadyState: ' + xhr.readyState);
	
	xhr.onload = function() {
		if (this.status == 200 && btn_get_text.textContent === 'Get Text') {
			sampleText.innerHTML = this.responseText;
			btn_get_text.textContent = 'Hide Text';
			console.log(this.responseText);
		} else if(this.status == 404) {
			btn_get_text.textContent = 'Get Text';
			sampleText.innerHTML = 'Not Found!';
			
		}else{
			btn_get_text.textContent = 'Get Text';
			sampleText.innerHTML = '';

		}
	};
	
	xhr.onreadystatechange = function(){
		console.log('Readystate: ' + xhr.readyState);
		if(this.readyState == 4 && this.status == 200){
			console.log(this.responseText);
		}
	}
	
	//Optional  - used for loaders
	xhr.onprogress = function(){
		console.log('onprogress: ' + xhr.readyState);
		
	};

	xhr.onerror = function(){
		console.log('Request error: ' );
	}
	
	xhr.send();
	
}
</script>
</body>

</html>