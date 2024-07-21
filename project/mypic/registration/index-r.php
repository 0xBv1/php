<?php include ("/xampp/htdocs/php/project/mypic/includs/ckregpage.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="registration-form">
        <form method="post">
            <!-- <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="repassword" id="password" placeholder="Re-Enter Password">
            </div> 
             <div class="form-group">
                <input type="text" class="form-control item" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="tel" id="phone" pattern="[0-9]{10}" required class="form-control item" name="phone-number" 
                    placeholder="Phone Number">
                    <small>Format: 1×××××××××</small><br>
                    
            </div>-->
            <div class="form-group">
                <input type="text" class="form-control item" name="birth-date" id="birth-date" placeholder="Birth Date">
            </div>
            <!--<div class="form-group">
                <input name="radio" type="radio" value="male">male
                <input name="radio" type="radio" value="female">female
                <br>
            </div> -->
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">
                    Create Account
                </button>
                <a href="../logi/index-l.php">
                    <button type="button" class="btn btn-block create-account">
                        You Have Account
                    </button>
                </a>

                
                    <?php foreach ($all_errors as $error): ?>
                        <h5><?= $error ?><br></h5>
                    <?php endforeach; ?>
                
        </form>
        <div class="social-media">
            <h5>Sign up with social media</h5>
            <div class="social-icons">
                <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
                <a href="#"><i class="icon-social-google" title="Google"></i></a>
                <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>