<?php

$min = 1000;

$max = 3000;


if (! empty($_POST['min_price']))  /*post method has no limits in the amount of info sent*/
{
    
$min = $_POST['min_price'];

}


if (! empty($_POST['max_price'])) 
{
    
$max = $_POST['max_price'];

}


?>

<!DOCTYPE html>

<html>

<head>



<script type="text/javascript">
  $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 1000,
      max: 10000,
      values: [ <?php echo $min; ?>, <?php echo $max; ?> ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		$( "#min" ).val(ui.values[ 0 ]);
		$( "#max" ).val(ui.values[ 1 ]);
      }
      });
    $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
     " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });

</script>


</head>


<body style="background: url(product-images/backet3.jpeg); background-repeat: no-repeat; background-size: 100% 100%;  opacity: 50%; ">
    
<center><h2>Price Range Search</h2>

</center>    
<div >
        
<form method="post" action="">
            
<div>
                
<input type="number" id="min" name="min_price"
 value="<?php echo $min; ?>">

<div id="slider-range"></div>

<input type="number" id="max" name="max_price"
 value="<?php echo $max; ?>">
            
</div>
            
<div>
 
<input type="submit" name="submit_range"
 value="Filter Products" >
 
</div>
        
</form>
    
</div>  
<?php


$conn = mysqli_connect("localhost", "root", "", "artgallery");


$result = mysqli_query($conn, "SELECT * from arts where art_price BETWEEN '$min' AND '$max' order by art_price ASC");


$count = mysqli_num_rows($result);

$row  = mysqli_fetch_array($result);
if ($count > 0)
{
 
?>
<hr > 
<div >
        
<table  >

<tr>
                
<th>Product name</th>

<th>Code</th>
                
<th >Price (in Rs.)</th>
 
<th></th>           
</tr>
<?php
    
while ($row = mysqli_fetch_array($result)) 
{
        
?>
    
        
<tr>
                
<td><img  src="img/collections/<?php echo $row['art_img']; ?>" class="img-fluid" /><?php echo $row['art_name']; ?></td>
                
<td ><?php echo $row['art_code']; ?></td>
                
<td ><?php echo $row['art_price']; ?></td>
 
<td  ><a href="index.php?artist=<?php echo $row['artist_id']; ?>">view</a></td>           
</tr>

<?php
    
} // end while
} 
else 
{
    
?>

<div>No Results</div>

<?php

}


mysqli_free_result($result);


mysqli_close($conn);

?>
</table>
    
</div>
<div>
<center><a href="userloginfinal.php" class="previous">user page</a></center>
</div>
</html>