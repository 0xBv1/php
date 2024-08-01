<?php 
include("header.php");
if($_SERVER['REQUEST_METHOD']== 'POST'){
    // var_dump($_POST);
    $username =$_POST['Username'];
    $password =$_POST['Password'];
    $email =$_POST['Email'];
    $age =$_POST['Age'];
    $phone =$_POST['Phone'];
    $gender =$_POST['gridRadios'];
    $address =$_POST['addresss'];
    $rule =$_POST['rule'];
    $data = [ 
    "usernames" =>$username ,
    "passwords" =>$password ,
    "emails" =>$email ,
    "phones" =>$phone ,
    "dates" =>$age ,
    "genders" =>$gender ,
    "addresss" =>$address ,
    "Rule" =>$rule ] ;
    sqladd($data);

}




?>
<div class="container-fluid pt-4 px-4">
<div class="bg-secondary rounded-top p-4">
    

    <h6 class="mb-4">ADD user Form</h6>
    <form method="post">
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" name="Username" class="form-control" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="Password" class="form-control" id="inputPassword3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email"name="Email" class="form-control" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-10">
                <input type="number" name="Age" class="form-control" id="inputPassword3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
            <input type="tel" id="phone" pattern="[0-9]{10}" class="form-control item" name="Phone" >            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">addresss</label>
            <div class="col-sm-10">
                <input type="text" name="addresss" class="form-control" >
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Gender
            </legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="male" checked="">
                    <label class="form-check-label" for="gridRadios1">
                        male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="female">
                    <label class="form-check-label" for="gridRadios2">
                        female
                    </label>
                </div>
            </div>
        </fieldset>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Gender
            </legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rule" id="gridRadios1" value="admin" checked="">
                    <label class="form-check-label" for="gridRadios1">
                        admin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rule" id="gridRadios2" value="user">
                    <label class="form-check-label" for="gridRadios2">
                        user
                    </label>
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Add user</button>
    </form>
</div></div>
<?php 
include("footer.php");
?>
