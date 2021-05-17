<?php include_once "templates/header.php";?>


<?php 

	include "autoload.php";

	/**
	 *  set cookie --login return 
	 */

	if(isset($_COOKIE['user_logged_in_id'])){
		$id=$_COOKIE['user_logged_in_id'];

		$_SESSION['login_user_id']=$id;
		$_SESSION['login_status']=true;

		header('location:profile.php');

	}


	/**
	 * check user login
	 */
	if(isset($_SESSION['login_status']) AND $_SESSION['login_status'] == true){

		header('location:profile.php');
	}

	/**
	 * login process
	 */

	 if(isset($_POST['loginform'])){
		$access=$_POST['access'];
		$password=$_POST['password'];

		$login_data =connect()->query("SELECT * FROM users WHERE email='$access' || username='$access' || cell='$access'");
		
		$login_user_data=$login_data->fetch_object();

		 if(empty($access) || empty($password)){

			 $msg=validate('All fields are requrired');
		 }else{

			if($login_data->num_rows== 1){
				
				  if(password_verify($password,$login_user_data->password) || md5($password) == $login_user_data->password){

					$_SESSION['login_user_id']=$login_user_data->id;
					$_SESSION['login_status']=true;

					setcookie('user_logged_in_id',$login_user_data->id,time() + (60*60*24*7));
					

					header('location:profile.php');


				  }else{
					  $msg=validate('Password incorrect !');
				  }



			 }else{
				$msg=validate('No user found !');
			}
	
		}


		
	 }

?>


<div class="wrap shadow">
	<div class="card">
		<div class="card-body">
			<h2>Log In Here</h2>
			<?php
				if(isset($msg)){
					echo $msg;

				}
			?>

			<form action="" method="POST">

				<div class="form-group">
                  <label for="">Email / Username / Cell</label>
                  <input name="access" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" class="form-control" type="password">
                </div>
				<div class="form-group">
					<input name="loginform" class="btn btn-primary" type="submit" value="Login">
				</div>

			</form>

		</div>
		<div class="card-footer">
            <a href="register.php">create an account</a>
        </div>
	</div>
	<div class="row">

      <?php
		
			
			$recent_logout_user_id =json_decode( $_COOKIE['recent_login_users']);
			
			$users_id= implode(',',  $recent_logout_user_id);
		
			$data =connect()->query("SELECT * FROM users WHERE id IN($users_id)");
			echo "<pre>";
			print_r($data);	
			
			while($user_data=$data->fetch_object()):
		
	 	
	  ?>
            <div class="col-md-2 my-3" >
               <div class="card" >
					<div class="card-body" style="padding:7px;"><p><button class='close' data-dismiss='alert'>&times;</button></p>
						<img style="width:30%; height:30%; display:block; margin-left:auto;margin:auto; " src="photos/users/<?php echo $user_data->photo?>" alt="">
					</div>
					<div class="card-footer" style="padding:5px;">
						<h4 style= "text-align:center;"><?php echo $user_data->name?></h4>
					</div>
			   </div>
            </div>
		<?php endwhile; ?>		
				
        </div>
</div>

<?php include_once "templates/footer.php";?>