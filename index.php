<?php
    include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
   <link rel="stylesheet" href="stylee.css"> 
</head>
<body>
        <?php
        $db->login();
        ?>

<div class="login">
   

    <form   method="post">
    	<input type="text" name="username" placeholder="Username"  />
      
        <input type="password" name="password" placeholder="Password"  />
        <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form> 
    <div class="wewe">
   
       <p><a href="singup.php" >tsajal</a></p> 
    </div>
   
</div>
</body>
</html>