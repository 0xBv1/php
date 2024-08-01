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
        <form class="p-3 mb-2 bg-dark text-white" method="post" enctype="multipart/form-data">
            <div class="col-md-3">
                <div class="header-logo">
                    <a href="#" class="logo">
                        <img src="logo.png" alt="">
                    </a>
                </div>
            </div>
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST')  :?>
        <h5 style=" text-align: center;"><?= $validate ?><br></h5>
                <?php endif;?>
            <div class="form-group">
            
            <label for="username">Username:</label>
                <input type="text" class="form-control item" name="username" id="username" placeholder="Username">
                
                <?php foreach ($error_user as $error): ?>
                    <h5><?= $error ?><br></h5>
                <?php endforeach; ?>

            </div>
            <div class="form-group">
            <label for="username">Password:</label>
                <input type="password" class="form-control item" name="password" id="password" placeholder ="password" >
                <?php foreach ($error_pass as $error): ?>
                    <h5><?= $error ?><br></h5>
                <?php endforeach; ?>

            </div>
            <div class="form-group">
            <label for="username">Re-Enter Password:</label>
                <input type="password" class="form-control item" name="repassword" id="password"
                placeholder ="repassword">
            </div>
            <div class="form-group">
            <label for="username">Email:</label>
            <input type="text" class="form-control item" name="email" id="email" placeholder="exsmple@email.com">
                <?php foreach ($error_email as $error): ?>
                    <h5><?= $error ?><br></h5>
                <?php endforeach; ?>

            </div>
            <div class="form-group">
            <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" pattern="[0-9]{10}" class="form-control item" name="phone-number"
                    placeholder="Phone Number">
                <?php foreach ($error_phone as $error): ?>
                    <h5><?= $error ?><br></h5>
                <?php endforeach; ?>

                <small>Format: 1×××××××××</small><br>

            </div>
            <div class="form-group">
            <label for="dob">Date of Birth (DD/MM/YYYY):</label>
                <input type="text" class="form-control item" name="birth-date" id="birth-date" placeholder="Birth Date">
                <?php foreach ($error_date as $error): ?>
                    <h5><?= $error ?><br></h5>
                <?php endforeach; ?>

            </div>
            <div style=" text-align: center;" class="form-group">
                <h3 style=" text-align: center;">Optional Data</h3>
                <h3><input name="radio" type="radio" value="male">male</h3>
                <h3><input name="radio" type="radio" value="female">female</h3>
                <br>
            </div>
            <div class="form-group">
                <label for="profile_image">Profile Image:</label>
                <input type="file" id="profile_image" name="profile_image" accept="image/*" required><br><br>
                <?php foreach ($error_img as $error): ?>
                    <h5><?= $error ?><br></h5>
                <?php endforeach; ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">
                    Create Account
                </button>
                <a href="../logi/index-l.php">
                    <button type="button" class="btn btn-block create-account">
                        You Have Account
                    </button>
                </a>
            </div>
        
        <div class="social-media  p-3 mb-2 bg-dark text-white ">
            <h5>Sign up with social media</h5>
            <div class="social-icons">
                <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
                <a href="#"><i class="icon-social-google" title="Google"></i></a>
                <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
            </div>
        </div></form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>