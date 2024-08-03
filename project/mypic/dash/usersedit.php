<?php
ob_start();
include ("header.php");
?>
<div class="container-fluid pt-4 px-4">
<div class="bg-secondary rounded-top p-4">
<form action="" method="post">
<div class="bg-secondary rounded">
    <h6 class="text-center">Delete All Users</h6>
    <div class="">
        <button class="btn btn-outline-primary w-100 m-1" name="dl"type="submit">Delete All</button>
    </div>
</div></form></div>
<div class="container-fluid pt-4 px-4">
<div class="bg-secondary rounded-top p-4">
<h6 class="mb-4">Users Table</h6>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Date</th>
                <th scope="col">Gender</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $row): ?>
                <tr>
                    
                    <th scope="row"><?= htmlspecialchars($row["id"]) ?></th>
                    <td><?= htmlspecialchars($row["usernames"]) ?></td>
                    <td><?= htmlspecialchars($row["passwords"]) ?></td>
                    <td><?= htmlspecialchars($row["emails"]) ?></td>
                    <td><?= htmlspecialchars($row["phones"]) ?></td>
                    <td><?= htmlspecialchars($row["dates"]) ?></td>
                    <td><?= htmlspecialchars($row["genders"] ?? 'N/A') ?></td>
                    <form action="?iid=<?=$row["id"]?>" method="post">
                        <td>
                            <button type="submit" name="u"  class="btn btn-outline-primary">Update</button>
                            <button type="submit" name="d" class="btn btn-outline-primary">Delete</button>
                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>
            <?php if (isset($_POST['u'])): ?>
                <?php $thse =$_GET['iid'];
                    global $thse ;

                ?>
                
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">update user and pass only</h6>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username: </label>
                                <input type="text" name="new-name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password:</label>
                                <input type="password" name="new-pass" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" value="save" class="btn btn-primary">save</button>
                        </form>
                    </div>
                <?php endif;?>
                <?php if (isset($_POST['d'])){
                    
                    $id =$_GET['iid'] ;
                            
                    $condition = ["id" => $id];   
                    sqldelete('reg', $condition);
                    header("Location: " . $_SERVER['PHP_SELF']);


                } ?>
             
                <?php if (isset($_POST['new-name'])){
                    
                   
                    
                    $nuser=$_POST['new-name'];
                    $npass=$_POST['new-pass'];

                    $data = [ 
                        "usernames" => $nuser,
                        "passwords" => $npass,
                        ];
                    
                    $condition = ["id" => $_GET['iid']]; 
                    // print_r( $condition);
                    $table = "reg";
                    sqlupdate( $table ,$data, $condition);
                    header("Location: " . $_SERVER['PHP_SELF']);
                    
                        
                }?>
                <?php if (isset($_POST['dl'])){
                    removeAllData('reg');
                    header("Location: " . $_SERVER['PHP_SELF']);
                } ?>



                
        <?php else: ?>
            <tr>
                <td colspan="8">No data available</td>
            </tr>
        <?php endif; ?>    
        </tbody>
    </table>
</div>
</div>
</div>

<?php
include ("footer.php");
?>
<?php
// End output buffering and flush the bufferob_start();
ob_end_flush();
?>