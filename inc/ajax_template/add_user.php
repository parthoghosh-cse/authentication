<?php
 include"../../autoload.php";

 //Get all user registation Data

 $name=$_POST['name'];
 $email=$_POST['email'];
 $username=$_POST['username'];
 $cell=$_POST['cell'];
 $password=$_POST['password'];

 //password_hash

 $hash_password=password_hash($password,PASSWORD_DEFAULT);


 //upload user photo  
$file = move($_FILES['photo'], '../../photos/users/');


$file_name= $file['unique_name'];




if(empty($file['err_msg'])){

//send data to database
create("INSERT INTO users(name,email,username,cell,password, photo) VALUES('$name','$email','$username','$cell','$hash_password','$file_name')");

echo "User registration successful";

} else {

    echo $file['err_msg'];
}



?>