if (isset($_POST['auth_name'])) {
  $name=mysqli_real_escape_string($link, $_POST['auth_name']);
  $pass=mysqli_real_escape_string($link, $_POST['auth_pass']);
  $query = "SELECT * FROM users WHERE name='$name' AND pass='$pass'";
  $res = mysqli_query($link, $query) or trigger_error(mysql_error().$query);
  if ($row = mysqli_fetch_assoc($res)) {
    session_start();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
  }
  header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  exit;
}
if (isset(@$_GET['action']) AND @$_GET['action']=="logout") {
  session_start();
  session_destroy();
  header("Location: http://".$_SERVER['HTTP_HOST']."/");
  exit;
}
if (isset($_REQUEST[session_name()])) session_start();
if (isset($_SESSION['user_id']) AND $_SESSION['ip'] == $_SERVER['REMOTE_ADDR']) return;
else {
?>
<form method="POST">
<input type="text" name="auth_name"><br>
<input type="password" name="auth_pass"><br>
<input type="submit"><br>
</form>
&lt;?
}
exit;
