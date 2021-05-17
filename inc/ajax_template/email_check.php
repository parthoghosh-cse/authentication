<?php
 include"../../autoload.php";

 $email=$_POST['email'];


  $data=datacheck('users','email',$email);

  if($data == true){
    echo "Email already exists !";
  }


 ?>