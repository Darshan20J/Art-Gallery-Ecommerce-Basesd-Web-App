<?php
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Homepage</title>
	</head>
	<body >

      		<div >
			<img src="product-images/logo.png"  alt="My Logo" > <div class="backdrop">
    <p >Sparkles</p>
</div> 
<H2> <FONT > <MARQUEE BGCOLOR = "mediumturquoise" DIRECTION = "LEFT"> An Artist is not paid for his labor but for his VISION... </MARQUEE> </FONT> </H2>

<form name="myform">
<div class="wrap">
      <div class="search">
	<input type="text" name="search" class="searchTerm" placeholder="What are you looking for?(classic or modern)" title="Please search for classic or modern paintings">
      	   <button type="submit" class="searchButton" onclick="result(this)">  
          <img src="product-images/search.png" height="30px" width="30px" style="margin: 0px 0px 0px -6px">
     </button>
   </div>
</div>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="homepagefinal.php"> Home</a>
  <a href="aboutpagefinal.php"> About us</a>
  <a href="collections-leo.php"> Collections</a>
  
</div>

<!-- to open side navigation bar function is used -->
<div id="main">
  <span style="font-size:30px;cursor:pointer;color:white" onclick="openNav()">&#9776; Menu</span>
</div>

<h2 style="font-size:2vw; ">
      <span style="background-color: yellow;"> <blink>OFFERS</blink></span>
 </h2> 


  <fieldset id="lavfield" style="float:left;display:inline-block;line-height:37px;padding-left:14px;max-width:290px;">
<marquee behavior="scroll" direction="up" scrollamount="2"> <b> <h4> <ol type="1">
<li> Get a exciting gift for Two Young Girls at the Piano by Pierre-Auguste Renoir during delivery!!! </li>
<li> Free shipping on Andy Warhol's Paintings...</li>
<li> Buy two Leonardo Da Vinci's painting and get a gift voucher worth Rs. 500 during delivery. </li> </b> </h4> </marquee>
</fieldset>

<div>
<fieldset id="lavfield" >
  <h3 > <b> OTHER OPTIONS </b> </h3>

<div >
    <a href="register.php"> Create an Account? </a>
    <br> 
    <a href="login.php"> Login </a>
</div>
  </div> 
</fieldset>
</form> 

<div >

<div >
  <div >1 / 4</div>
  <img src="product-images/07569-1.jpg" >
  <div >louisiana heron</div>
</div>

<div >
  <div >2 / 4</div>
  <img src="product-images/cowboys.jpg" >
  <div > Indians-John Wayne</div>
</div>

<div >
  <div >3 / 4</div>
  <img src="product-images/ermine.png" >
  <div >Ermie</div>
</div>

<div >
  <div >4 / 4</div>
  <img src="product-images/hb.jpg" >
  <div >Girls at the Piano</div>
</div>


<a  onclick="plusSlides(-1)">&#10094;</a>
<a  onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div >
  <span  onclick="currentSlide(1)"></span> 
  <span  onclick="currentSlide(2)"></span> 
  <span  onclick="currentSlide(3)"></span> 
  <span  onclick="currentSlide(4)"></span>
</div>


<div >
  <h4> CONTACT DETAILS </h4>
  <p> Address : #5, 1st Cross, Haines Road, Basaveshvara Nagar, Bangalore - 560048 </p>
  <p> E-mail : <a href="http://www.gmail.com"> sparklesartgallery@gmail.com </a> </p> 
  <p> Contact Number : 8393822649, 080-22359804 </p>
</div>


<script>

function result(myform){
	var searchword = document.myform.search.value;
	var classic="classic";
	var modern="modern";
	if(searchword==classic)
	{
              window.open("classic.php");
	}
	else if(searchword==modern){
		      window.open("modern.php");
	}
	else{
		window.open("noresult.php");
	}
	
}
function openNav() {
  document.getElementById("mySidenav").style.width = "230px";
  document.getElementById("main").style.marginLeft = "230px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
   
 }


var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>


	</body>
</html>




