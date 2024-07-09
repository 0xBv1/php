<?php require "../includes/ckdata.php"; ?>
<?php require "../includes/head.php"; ?>



<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">username</label>
    <input name="username" type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary">Login</button>
  <button  type="submit" class="btn btn-primary" name ='signup' value="true">signup</button>
  </form>
<?php require "../includes/foot.php"; ?>
