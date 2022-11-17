<?php
//connection
$con=mysqli_connect("localhost","root","root","bookdb");




if(isset($_POST['btnadd']))
{
$name=$_POST['name'];
$query=mysqli_query($con,"insert into book values('','$name')");
if($query)
{
    echo "<script>alert(recorde insert</script>";
}
}
?>
 <form method = post>
Name:<input type="text", name="name">
 <button type="submit" name="btnadd">add</button>
 
 <td> <a href=searchform.php>search</a>
 </form>
 <?php
 $query=mysqli_query($con,"select * from book");
 echo"<table border=2>";
 echo"<th>id";
 echo"<th>name";
 echo"<th>edit";
 echo"<th>delete";
 while($row=mysqli_fetch_array($query))
 {
    echo"<tr>";
    echo"<td>".$row['id'];
    echo"<td>".$row['name'];
    echo"<td> <a href=update.php?x=$row[0]>edit</a>";
    echo"<td> <a href=delete.php?x=$row[0]>delete</a>";
 }
 echo"</table>";
 ?>
 <!-- delete.php -->
 <?php
$ID=$_GET['x'];

$con=mysqli_connect("localhost","root","root","bookdb");

$query=mysqli_query($con,"delete from book where id=$ID");
if($query)
{
    echo "<script>alert('delete recorde');</script>";
}
else{
    echo "Not ";
}
?>
<!-- search.php -->
<?php
if(isset($_POST['btnsearch']))
{
$name = $_POST['name'];

$con=mysqli_connect("localhost","root","root","bookdb");


$sql = "select * from book where $name like '%$name%'";

$result = $con->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo $row["name"]."  ""<br>";
}
} else {
	echo "0 records";
}

$conn->close();
}
?>
<!-- searchform.php -->
<form action="searchform.php" method = post>
    Name:<input type="text", name="name" required/>
     <button type="submit" name="btnsearch">search</button>
 </form>

 <?php

if (isset($_POST["btnsearch"])) {
  
  require "search.php";

  
  if (count($results) > 0) { foreach ($results as $r) {
    printf("<div>%s - %s</div>", $r["name"]);
  }} else { echo "No results found"; }
}
?>
<!-- html -->
<!Doctype Html>  
<Html>     
<Head>      
<Title>     
Create a Registration form   
</Title>  
</Head>  
<Body>   
The following tags are used in this Html code for creating the Registration form:  
<br>    
<form>    
<label> Firstname </label>           
<input type="text" name="firstname" size="15"/> <br> <br>   
<label> Lastname: </label>           
<input type="text" name="lastname" size="15"/> <br> <br>    
<label>     
Course :    
</label>     
<select>    
<option value="Course">Course</option>    
<option value="BCA">BCA</option>    
<option value="BBA">BBA</option>    
<option value="B.Tech">B.Tech</option>    
<option value="MBA">MBA</option>    
<option value="MCA">MCA</option>    
<option value="M.Tech">M.Tech</option>    
</select>    
<br>    
<br>    
<label>     
Gender :    
</label><br>    
<input type="radio" name="gender"/> Male <br>    
<input type="radio" name="gender"/> Female <br>    
<input type="radio" name="gender"/> Other    
<br>    
<br>    
<label>  
Hobbies:  
</label>    
<br>    
<input type="checkbox" name="Programming"> Programming <br>    
<input type="checkbox" name="Cricket"> Cricket <br>    
<input type="checkbox" name="Football"> Football  <br>   
<input type="checkbox" name="reading Novel"> Reading Novel  <br>   
<br>    
<br>   
<label>     
Phone :    
</label>      
<input type="text" name="phone" size="10"> <br> <br>    
Address    
<br>    
<textarea cols="80" rows="5" value="address">    
</textarea>    
<br> <br>    
Email:    
<input type="email" id="email" name="email"> <br>      
<br> <br>    
Password:    
<input type="Password" id="pass" name="pass"> <br>     
<br> <br>    
<input type="submit" value="Submit">    
<input type="reset" value="Reset">  
</form>    
</Body>   
</Html>  