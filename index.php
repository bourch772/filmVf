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
		<header>
			<h1>IFLIX</h1>
		</header>
	
		<div id="container">
<?php
include('simple_html_dom.php');
$pg=1;
if(isset($_GET['pg']))
{
$pg=$_GET['pg'];
}


$html = file_get_html('https://vf.k-streaming.com/page/'.$pg);
$cl = rand(0, 100);
$x = '';
foreach($html->find('.moviefilm') as $a) {
	if (strpos($a, 'Saison') == false) {
	$element = $a->find('a')[0];
	
    $img = $a->find('img')[0];
	$cl = $cl+10;
	$x = $x.'<button onclick="vid(\''.$element->href.'\')" style="width: 100%; background-color: hsl('.$cl.', 63%, 81%);" class="clearfix"><a  ><img src="'.$img->src.'" alt="thumb"  style="width: 80%; height: auto;" class="thumbnail"><h2>'.$img->alt.'</h2></a></button>';
}}
echo '<ul style="text-align: -webkit-center; ">'.$x.'</ul></div><footer><button class="button" onclick="('.$pg.')" style=" width: 28%; left: 0;" >BACKkk</button><button class="button" onclick="('.$pg.')" style=" width: 28%; right: 0; ">NEXT</button><button class="button" id="pg" style=" width: 30%; left: 35%;">'.$pg.'</button>';



?>
			

		</footer>
<style>
.button {
 
max-width: 100%; 
display: block; 
position: fixed; 

height: 7%;
  padding: 15px 25px;

  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: white;
  background-color: red;
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
</style>		</div>
	</div>
<script type="text/javascript">
function vid(href) {

 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
				window.open(this.responseText);
            }
        };
        xmlhttp.open("GET", "?m=1&href="+ href, true);
        xmlhttp.send();

}

function next(href) {
var pag = '';
if(href == 222){
pag = 1;
}else{
pag = href+1;}

window.location.href =  "?pg="+ pag;

}

function back(href) {
var pag = '';
if(href == 1){
pag = 222;
}else{
pag = href-1;}
window.location.href =  "?pg="+ pag;
}

</script>
</body>
</html>
