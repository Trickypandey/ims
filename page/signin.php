<?php
require "../classes/admin.class.php";
require "../classes/structure.class.php";

$con = Structure::header("Login");
// echo '<pre>';
// die;
print_r($_SESSION);
// die;
// Import main class
$users = ['admin', 'student','teacher'];
$eror='';
if(isset($_POST['login']))
{
  if($users[1]==$_POST['user_type'])
  {
    
  }
  elseif($users[2]==$_POST['user_type'])
  {
    $email=$_POST['email'];
    $password= $_POST['password'];
    $sql= "SELECT * FROM `teacher` WHERE email like '$email' && password like '$password'";
    if(false!== $result = mysqli_query($con, $sql)){
      $data = mysqli_fetch_assoc($result);
      if($data !== null)
        $_SESSION['uid'] = $data['teacher_id'];
      else
        $eror = 'Invalid credential';
    }else{
      $eror = 'Invalid credential';
    }
  }
  elseif($users[0]==$_POST['user_type'])
  {
    
  }
  else{
    $eror='who are you';
  }
}



?>

<main role="main" class="container mt-3">
  <div class="row justify-content-md-center">
        <img class="mb-4" src="src/img/login.png" width="72" height="72">
  </div>
  <div class="row">
    <form action="" method="post" class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <div class="form-group">
        <select class="form-control" name="user_type" id="user_type" style="height: calc(2.5rem + 2px);">
        <?php
        
          foreach($users as $i => $u){
            if(isset($_GET['show']) && $u == $_GET['show']){
              echo "<option value=\"$u\" selected>$u</option></a>";
            }else{
              echo "<option value=\"$u\">$u</option></a>";
            }
          }

            ?>
          
        </select>
      </div>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
      <br>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
      <?= $eror ?>
      <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
  </div>
</main>
<?php
Structure::footer();
