<?php
include ("header.php");
function sqladdp( $table, $data) {
    
    
    // echo"$admin";
    $servername = "localhost";
    $username_db = "root";
    $password = "";
    $dbname = "regg";

    // Create connection
    $conn = mysqli_connect($servername, $username_db, $password, $dbname);

    // Prepare column names and values for SQL statement
    $columns = implode(", ", array_map(function($col) {
        return "`" . $col . "`";
    }, array_keys($data)));
    $values = "'" . implode("', '", array_map([$conn, 'real_escape_string'], array_values($data))) . "'";
    
    // Create the SQL insert statement
    $sql = "INSERT INTO `$table` ($columns) VALUES ($values)";
    
    // Execute the SQL statement
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // var_dump($_POST);
    $name =$_POST['product-name'];
    $rate =$_POST['inlineRadioOptions'];
    $count =$_POST['product-count'];
    $description =$_POST['description'];
    $originalPrice = $_POST['product-price'];
    $discountPercentage = $_POST['discount'];
    $categore1 = $_POST['categore'];
    $categore = "[" . implode(", ", $categore1) . "]";
    // echo'<br>'.$name.'<br>'.$rate.'<br>'.$count.'<br>'.$description.'<br>'.$originalPrice.'<br>'.$discountPercentage.'<br>'.$categore.'<br>';

    $discountAmount = ($originalPrice * $discountPercentage) / 100;
    $finalPrice = $originalPrice - $discountAmount;
    // echo "$finalPrice";
    $data = [
        "product-names" =>$name ,
        "descriptions" => $description, // Add appropriate description
        "prices" =>$originalPrice ,
        "discounts" => $discountPercentage,
        "categores" => $categore, // Map inlineRadioOptions to categories
        "rate" =>$rate , // Assuming a default rate or calculate as needed
        "count" => $count    ];
    sqladdp("products",$data);
    //     $uploads_dir = 'uploads';
//     if (!is_dir($uploads_dir)) {
//         mkdir($uploads_dir, 0777, true);
//     }

    //     $tmp_name = $_FILES['image']['tmp_name'];
//     $name = basename($_FILES['image']['name']);
//     $target_file = "$uploads_dir/$name";

    //     if (move_uploaded_file($tmp_name, $target_file)) {
//         $uploaded_image = $target_file;

    //     } else {
//         $error = "Failed to upload image.";
//     }
}
// style="display: flex;"
?>
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <form action="" method="post" enctype="multipart/form-data">
            <!-- <input type="file" class="form-control-file" name="image" id="imgInput" required> -->
            <div class="row mb-3">
                <label for="inputname" class="col-sm-2 col-form-label">Name Of Product</label>
                <div class="col-sm-10">
                    <input type="text" name="product-name" class="form-control" id="inputname">
                </div>
            </div>
            <label class="form-check-inline" for="cate">Category : </label>

            <div class="form-check-inline" id="cate">
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"name="categore[]" id="inlineCheckbox1" value="accessories">
                    <label class="form-check-label" for="inlineCheckbox1">accessories</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="camrea"name="categore[]">
                    <label class="form-check-label" for="inlineCheckbox1">camrea</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="computers"name="categore[]">
                    <label class="form-check-label" for="inlineCheckbox1">computers</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="headphones"name="categore[]">
                    <label class="form-check-label" for="inlineCheckbox1">headphones</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="phones"name="categore[]">
                    <label class="form-check-label" for="inlineCheckbox1">phones</label>
                </div>

            </div>

            <div class="row mb-3">
                <label for="inputprice" class="col-sm-2 col-form-label">Price Of Product</label>
                <div class="col-sm-10">
                    <input type="number" name="product-price" class="form-control" id="inputprice">
                </div>
            </div>
             <div class="row mb-3">
                    <label class="form-check-inline" for="discountPercentage">Discount Percentage:</label>
                    <input type="number" step="0.01" class="form-control" id="discount" name="discount" required>
                </div>

            <label class="form-check-inline" for="redio">Rate :</label>
            <div class="form-check-inline "id="redio">
               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="2">
                    <label class="form-check-label" for="inlineRadio1">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="3">
                    <label class="form-check-label" for="inlineRadio1">3</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="4">
                    <label class="form-check-label" for="inlineRadio1">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="5">
                    <label class="form-check-label" for="inlineRadio1">5</label>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputname" class="col-sm-2 col-form-label">Count in store</label>
                <div class="col-sm-10">
                    <input type="number" name="product-count" class="form-control" id="inputname">
                </div>
            </div>

            <div class="form-floating">
                                <textarea class="form-control" name="description" placeholder="Leave a Description here" id="floatingTextarea" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">Descriptions</label>
                            </div>













            <button type="submit" class="btn btn-primary mt-3">Upload</button>
        </form>
    </div>
</div>

<?php
include ("footer.php"); ?>