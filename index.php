<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Simple Mobile Listview</title>
  <meta name="author" content="Jake Rocheleau">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
  <?php include('styles.css');?> 
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <?php include('retina.js');?>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  

</head>

<body>
	<div id="view">
		<header id="header">
			
    <input type="text" id="fname" name="firstname" >

    <button onclick="Submit()" value="search">search</button>
  
		</header>
	
<?php
include('simple_html_dom.php');
$pg=1;
$html = '';
if(isset($_GET['pg']))
{
$pg=$_GET['pg'];
$html = file_get_html('https://vf.k-streaming.com/page/'.$pg);

}else if(isset($_GET['sr']))
{
$sr=$_GET['sr'];
$html = file_get_html('https://vf.k-streaming.com/?s='.$sr);

}
else{
	
$html = file_get_html('https://vf.k-streaming.com/');
	
}



$cl = 0;
$x = '';
foreach($html->find('.moviefilm') as $a) {
	if (strpos($a, 'Saison') == false) {
	$element = $a->find('a')[0];
	
    $img = $a->find('img')[0];
	$cl = $cl+10;
	$x = $x.'<button onclick="vid(\''.$element->href.'\')" style="width: 100%;     font-weight: bold; background-color: hsl('.$cl.', 63%, 81%);" ><a  ><img src="'.$img->src.'" alt="thumb"  style="width: 60%; height: auto;" ><h2>'.$img->alt.'</h2></a></button>';
}}
echo '<ul style="text-align: -webkit-center;     font-weight: bold;">'.$x.'</ul><button class="button" onclick="back('.$pg.')" style=" width: 28%; left: 0;     font-weight: bold;" >BACK</button><button class="button" onclick="next('.$pg.')" style=" width: 28%; right: 0;     font-weight: bold;">NEXT</button>';



?>
<button class="button" alt="0" onclick="find(this)" style=" width: 30%; left: 35%;  font-weight: bold;">search</button>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.button {
 
max-width: 100%; 
display: block; 
position: fixed; 
bottom: 0; 
z-index: 9999; 
height: 7%;
  padding: 15px 25px;
  
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  background-color: #4CAF50;
  border: none;
  border-radius: 5px;
  box-shadow: 0 9px blue;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>		
	</div>
<script type="text/javascript">
 var x = document.getElementById("header"); 
x.style.display = "none";
function vid(href) {

 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
				window.open(this.responseText);
            }
        };
        xmlhttp.open("GET", "https://sshphp-196113.appspot.com/?m=1&href="+ href, true);
        xmlhttp.send();

}


function find() {
	
   
  if ( x.style.display == "none") {
        x.style.display = "block";
    } else {
         x.style.display = "none";
    } 
}



function submit() {


window.location.href =  "https://sshphp-196113.appspot.com/?sr="+ document.getElementById("fname").value;
}


function next(href) {
var pag = '';
if(href == 222){
pag = 1;
}else{
pag = href+1;}

window.location.href =  "https://sshphp-196113.appspot.com/?pg="+ pag;
}

function back(href) {
var pag = '';
if(href == 1){
pag = 222;
}else{
pag = href-1;}
window.location.href =  "https://testphp-1097.appspot.com?pg="+ pag;
}

</script>
</body>
</html>
