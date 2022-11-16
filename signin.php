<!DOCTYPE html>
<?php


if(isset($_POST["signin"])){
    
    $password=$_POST["password"];
$email=$_POST["email"];


 require 'connect.php';
 
 //where conition and condition
$select="select * from users where  email='$email' ";
$query=  mysqli_query($con, $select);


//$x=mail($to, $subject, $message);
 if(mysqli_num_rows($query)>0){   
    
    $row=  mysqli_fetch_array($query);
     
   if($row["password"]==$password) {
echo '<script>alert("welcome");window.location.assign("home.php");</script>';
  
   } 
   else{
 echo '<script>alert("wrong password");</script>';

   }
    
 }
 else{
     
         echo '<script>alert("email does not exist plz sign up");window.location.assign("signup.php");</script>';

     
     
 }
    
    
    
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <form action="<?php  echo $_SERVER["PHP_SELF"]; ?>" method="post" >
            
            <table border="3" align="center">
            
                <tr>
                    <td colspan="2" align="center">
                        signin
                    </td>
                        
                </tr>
               
            
            
             <tr>
                    <td>email</td>
                    <td><input type="email" name="email" required></td>
                </tr>
            
             <tr>
                    <td>password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
            
            
             
              
             <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="signin" value="signin">
                        <input type="reset">
                               
                    </td>
                        
                </tr>
            
            </table>
        </form>
        
        
        
    </body>
</html>
