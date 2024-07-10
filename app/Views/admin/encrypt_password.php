<!-- encryption key  -->
<!-- I manually enter the admin password after executing this code. -->

 <!-- Admins can only restore the password if they update their details. They cannot retrieve the password manually from this page -->
<?php

$password = '';

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo $hashedPassword;


 ?>           