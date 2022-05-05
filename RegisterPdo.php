<?php
$conn = mysqli_connect('localhost','root','','thu');


$err = [];

    
if(isset($_POST['mail'])){
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordconfirm'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if(empty($email) || strlen($email) >255 ){
        $err['email'] = 'email không được bỏ trống và nhỏ hơn 255 ký tự';

    }
    if(empty($name) || strlen($name) >200 || strlen($name) < 6){
        $err['name'] = 'name không được bỏ trống và có từ 6 đến 200 ký tự';

    }
    if(empty($password) || strlen($password)> 100 || strlen($password) < 6){
        $err['password'] ='password từ 6 đến 100 ký tự';

    }
      if($passwordconfirm != $password){
        $err['passwordconfirm'] ='mật khẩu nhập lại không đúng';

    }
       if(empty($phone) || strlen($phone)> 20 || strlen($phone) < 10){
        $err['phone'] ='phone có từ 10 đến 20 ký tự';

    }
    if(empty($address)){
        $err['address'] = 'địa chỉ không được bỏ trống';
    }
    //var_dump(empty($err));die();
    if(empty($err) !== false){
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(mail, name, password, phone, address) VALUES('$email','$name','$pass','$phone','$address')";
    $query = mysqli_query($conn,$sql);
    if($query){
        header('location: LoginPdo.php ');
    }
  }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">


</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng ký</h3>
                    </div>
                    <div class="panel-body">

                        <form action="" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="mail" type="email" autofocus>
                                </div>
                                <div class="has-error">
                                    <span color="red"><font color="red"><?php echo (isset($err['email']))?$err['email']:''    ?></font></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="name" name="name" type="text">
                                </div>
                                <div class="has-error">
                                    <span color="red"><font color="red"><?php echo (isset($err['name']))?$err['name']:''    ?></font></span>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="nhập mật khẩu" name="password" type="password" >
                                </div>
                                <div class="has-error">
                                    <span><font color="red"><?php echo (isset($err['password']))?$err['password']:''    ?></font></span>
                                </div>
                                <div class="form-group">
                                   <input class="form-control" placeholder="xác nhận mật khẩu" name="passwordconfirm" type="password" >
                                </div>
                                <div class="has-error">
                                    <span color="red"><font color="red"><?php echo (isset($err['passwordconfirm']))?$err['passwordconfirm']:'' ?></font></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="phone" name="phone" type="phone" >
                                </div>
                                <div class="has-error">
                                    <span><font color="red"><?php echo (isset($err['phone']))?$err['phone']:''    ?></font></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="dia chi" name="address"  >
                                </div>
                                <div class="has-error">
                                    <span><font color="red"><?php echo (isset($err['address']))?$err['address']:''    ?></font></span>
                                </div>


                                <button type="submit" class="btn btn-lg btn-success btn-block" name="submit">Đăng ký</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
