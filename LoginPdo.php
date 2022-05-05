<?php
session_start();
$conn = mysqli_connect('localhost','root','','thu');

$err =[];
if(isset($_POST['mail'])){
    $email = $_POST['mail'];
    $password = $_POST['password'];

    if(empty($email) || strlen($email) >255 ){
        $err['email'] = 'email không được bỏ trống và nhỏ hơn 255 ký tự';

    }
    if(empty($password) || strlen($password)>100 || strlen($password) < 6){
        $err['password'] ='password từ 6 đến 100 ký tự';
    }
    $sql = "SELECT*FROM  users WHERE mail = '$email'";
  
    $query = mysqli_query($conn,$sql);
  
    $data = mysqli_fetch_assoc($query);
    
    $checkEmail = mysqli_num_rows($query);
  
    if($checkEmail != 0){

    	$checkPass = password_verify($password, $data['password']);

    	if($checkPass !== false){
    		echo 'ddung';
    		$_SESSION['user'] = $data;
    		header('location: LoginSuccessPdo.php  ');
    	}else{
    		$err['checkPass'] = 'password sai ';
    	}

    }
    else{
    	$err['checkEmail'] = 'email không tồn tại';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng nhập</h3>
                    </div>
                    <div class="panel-body">

                        <form action="" method="POST" enctype="multipart/form-data">
                            <fieldset>
								<div class="has-error">
								     <span color="red"><font color="red"><?php echo (isset($err['checkPass']))?$err['checkPass']:''    ?></font></span>
								</div>
								<div class="has-error">
								      <span color="red"><font color="red"><?php echo (isset($err['checkEmail']))?$err['checkEmail']:''    ?></font></span>
								</div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="mail" type="email" autofocus>
                                </div>
                                <div class="has-error">
                                    <span color="red"><font color="red"><?php echo (isset($err['email']))?$err['email']:''    ?></font></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="nhập mật khẩu" name="password" type="password" >
                                </div>
                                <div class="has-error">
                                    <span><font color="red"><?php echo (isset($err['password']))?$err['password']:''    ?></font></span>
                                </div>
                                <div class="icheck-primary">
                                   <input type="checkbox"  name="remember">
							          <label for="remember">
							            Remember Me
							          </label>
                                     </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block" name="submit">Đăng nhập</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>






