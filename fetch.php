<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "search");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM number_search 
  WHERE number LIKE '%".$search."%'
  
 ";
}
else
{
 $query = "
  SELECT * FROM number_search  ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered table-dark">
    <tr>
     <th>Number</th>
     
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td  class="text-primary">'.$row["number"].'</td>
    
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>