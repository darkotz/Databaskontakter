<?php include 'code.php' ?> 
<!DOCTYPE html>
<html>
<head>
  <title>Användargränsnittet till code.php, inget CSS</title>
</head>
<body>
  <table>
    <form action="" method="post">
      <tr><td>Name: </td><td><input type="text" name="pu_name"></td></tr>
      <tr><td>Password: </td><td><input type="password" name="pu_password"></td></tr>
      <tr><td>E-mail: </td><td><input type="email" name="pu_email"></td></tr>
      <tr><td>Presentation: </td><td><input type="text" name="pu_text"></td></tr>
      <tr><td><input type="submit" name="send" value="Register"></td></tr>
    </form>
  </table>
</body>
</html>