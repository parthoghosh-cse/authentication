
<?php

 include_once "templates/header.php";

 include "autoload.php";
  /**
   * get login user data 
   */
  $login_user_data = loginUserInfo($_SESSION['login_user_id']);


/**
 * logout process
 */

if(isset($_GET['logout']) && $_GET['logout']=='user_logout'){
   
    if(isset($_COOKIE['recent_login_users'])){

        $old_data=json_decode($_COOKIE['recent_login_users']);
        
        array_push($old_data, $login_user_data->id);
        $logout_json = json_encode($old_data);


    }else{
        $logout_data[] = $login_user_data->id;
        $logout_json = json_encode($logout_data);
    }

    setcookie('recent_login_users',$logout_json,time() + (60*60*24*7));
        
    session_destroy();

    setcookie('user_logged_in_id',$login_user_data->id,time() - (60*60*24*7));

    header('location:index.php');
}

/**
 * check user login status
 */

 if(!isset($_SESSION['login_status'])){
     header('location:index.php');

 }





 


 ?>

  <div class="warp shadow">
        <div class="card">
        
            <div class="card-body">
                <img style="width:200px;height:200px;border-radius:50%;display:block; margin:20px auto ;" src="photos/users/<?php echo $login_user_data->photo?>" alt="">
                <h2 style="text-align:center"><?php echo $login_user_data->name?></h2>
                <hr>
                <table class="table">
                <tr>
                    <td>Name :</td>
                    <td><?php echo $login_user_data->name?></td>
                </tr>
                <tr>
                    <td>Cell :</td>
                    <td><?php echo $login_user_data->cell?></td>
                </tr>
                <tr>
                    <td>Username : </td>
                    <td><?php echo $login_user_data->username ?></td>
                </tr>
                
                
                </table>
            </div>
            <div class="card-footer">
                <a href="?logout=user_logout">Logout</a>
            </div>
        </div>

    
  </div>
 

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php include_once "templates/footer.php";?>