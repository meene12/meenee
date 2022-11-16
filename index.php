<!DOCTYPE html>
<?php
if(isset($_POST["signup"])){

 $fname=$_POST["fname"];
$lname=$_POST["lname"];
$username=$_POST["username"];
$password=$_POST["password"];
$email=$_POST["email"];
$gender=$_POST["gender"];
$hobby=  implode("-",$_POST["hobby"]);


$p=$_FILES["pic"];

$picname=$p["name"];
$pictmpname=$p["tmp_name"];


require 'connect.php';

//select  where field name=email

$select="select * from users where  email='$email'";
$query=  mysqli_query($con, $select);


if(mysqli_num_rows($query)>0){
    
    echo '<script>alert("email already exists plz sign in");window.location.assign("signin.php");</script>';
    
    
}
else{
    //email does not exists
    
    $insert="insert into users( `fname`, `lname`, `username`, `password`, `email`, `gender`, `hobby`, `pic` ) "
            . "values('$fname','$lname','$username','$password','$email','$gender','$hobby','$picname')";
    

    
    
    
    if($query2){
        
       $move= move_uploaded_file($pictmpname, "images/$picname");
       
       
       if($move){
           
               echo '<script>alert("done");window.location.assign("home.php");</script>';

       }
    }
    
}






}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="./fontawesome-all.min.css">
        <link rel="stylesheet" href="./main.css">
        <link rel="stylesheet" href="./noscript.css">
    </head>
    <body>
        <form action="<?php  echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
            
            <table border="3" align="center">
            
                <tr>
                    <td colspan="2" align="center">
                        signup
                    </td>
                        
                </tr>
                <tr>
                    <td>first name</td>
                    <td><input type="text" name="fname" required></td>
                </tr> 
              <tr>
                    <td>last name</td>
                    <td><input type="text" name="lname" required></td>
                </tr>
            
             <tr>
                    <td>user name</td>
                    <td><input type="text" name="username" required></td>
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
                    <td>gender</td>
                    <td><input type="radio" name="gender" value="male">male<br>
                    <input type="radio" name="gender" value="female">female
                    </td>
                </tr>
             
               
              <tr>
                    <td>hobby</td>
                    <td><input type="checkbox" name="hobby[]" value="read1">read1<br>
                        <input type="checkbox" name="hobby[]" value="read2">read2<br>
                        <input type="checkbox" name="hobby[]" value="read3">read3<br>
                        <input type="checkbox" name="hobby[]" value="read4">read4
                    </td>
                </tr>
             
                 <tr>
                    <td>pic</td>
                    <td><input type="file" name="pic"></td>
                </tr>
            
             <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="signup" value="signup">
                        <input type="reset">
                               
                    </td>
                        
                </tr>
            
            </table>
        </form>
        
        
        
    </body>
</html>
