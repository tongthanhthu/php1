<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php


if(isset($_POST['save-session'])){
  session_destroy();
  header('location: LoginPdo.php '); die();
}
?>
   <form action="" method="post"><div><button name="save-session" >logout</a></button></div>
 <font style="color:blue; text-align: center;"><h1>đăng nhập thành công<h1></font>
   </form>

</body>
</html>