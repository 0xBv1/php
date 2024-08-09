<?php
echo "Hello, World!";
?>
<?php
print "Hello, World!";
?>
<?php
echo 'Hello, World!'; // Outputs: Hello, World!
?>
<?php
echo "Hello, World!"; // Outputs: Hello, World!
?>
<?php
$name = 'John';
echo 'Hello, $name'; // Outputs: Hello, $name
echo "Hello, $name"; // Outputs: Hello, John
?>
<?php
$myVariable = "Hello, World!";
$my_variable = "Hello, World!";
$MyVariable = "Hello, World!";
?>

<?php
$a = 5;
$b = $a; // $b is assigned the value of $a
$b = 10; // Changing $b does not affect $a
echo $a; // Outputs: 5
echo $b; // Outputs: 10
?>

<?php
$a = 5;
$b = &$a; // $b is a reference to $a
$b = 10; // Changing $b also changes $a
echo $a; // Outputs: 10
echo $b; // Outputs: 10
?>

<?php
$name = 'John';
echo 'Hello, $name'; // Outputs: Hello, $name
?>

<?php
$name = 'John';
echo 'Hello, ' . $name; // Outputs: Hello, John
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP with HTML</title>
</head>
<body>
    <h1><?php echo "Hello, World!"; ?></h1>
</body>
</html>

<?php
$flag = true;
?>



<?php
$number = 42;
?>



<?php
$number = "42";
$intNumber = (int)$number; // Converts $number to an integer
?>



<?php
$price = 19.99;
?>


<?php
$text = "Hello, World!";
?>

<?php
$text = "Hello, World!";
?>


<?php
$var = null;
?>


<?php
$fruits = array("Apple", "Banana", "Cherry");
?>


<?php
$fruits = array("Apple", "Banana", "Cherry");
echo $fruits[0]; // Outputs: Apple
?>


<?php
$fruits = array("Apple", "Banana", "Cherry");
echo $fruits[1]; // Outputs: Banana
?>

<?php
$ages = array("John" => 25, "Jane" => 30, "Smith" => 22);
echo $ages["Jane"]; // Outputs: 30
?>


<?php
$matrix = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);
echo $matrix[1][2]; // Outputs: 6
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP with HTML</title>
</head>
<body>
    <h1><?php echo "Hello, World!"; ?></h1>
</body>
</html>


<?php 

$sum = 5 + 3; // $sum is 8

$difference = 5 - 3; // $difference is 2

$product = 5 * 3; // $product is 15

$quotient = 15 / 3; // $quotient is 5

$remainder = 5 % 3; // $remainder is 2

$power = 2 ** 3; // $power is 8







?>


<?php
$result = 5 + 3 * 2; // $result is 11, not 16 (multiplication first)

$x = 5;

$x += 3; // equivalent to $x = $x + 3


$x -= 3; // equivalent to $x = $x - 3

$x *= 3; // equivalent to $x = $x * 3


$x /= 3; // equivalent to $x = $x / 3

$x %= 3; // equivalent to $x = $x % 3


$text = "Hello" . " World"; // $text is "Hello World"


$text = "Hello";
$text .= " World"; // $text is "Hello World"

$isEqual = 5 == 5; // true

$isIdentical = 5 === "5"; // false

$isNotEqual = 5 != 3; // true

$isNotIdentical = 5 !== "5"; // true

$isGreater = 5 > 3; // true

$isLess = 5 < 3; // false

$isGreaterOrEqual = 5 >= 5; // true

$isLessOrEqual = 5 <= 3; // false


?>
<?php
$result = (5 > 3) ? "Greater" : "Smaller"; // $result is "Greater"


$value = $undefinedVariable ?? "default"; // $value is "default"


$value = $undefinedVariable ?: "default"; // $value is "default"

$x = 5;
$x++; // $x is 6


$x = 5;
$x--; // $x is 4


$result = (5 > 3 && 2 < 4); // true


$result = (5 > 3 || 2 > 4); // true


$result = !(5 > 3); // false



$result = 5 + 3 * 2; // $result is 11, not 16 (multiplication first)
$result = (5 + 3) * 2; // $result is 16 (parentheses first)

$result = 5 & 3; // $result is 1


$result = 5 | 3; // $result is 7


$result = 5 ^ 3; // $result is 6


$result = ~5; // $result is -6


$result = 5 << 1; // $result is 10

$result = 5 >> 1; // $result is 2

$array1 = array("a" => "apple", "b" => "banana");
$array2 = array("c" => "cherry", "b" => "blueberry");
$result = $array1 + $array2; // $result is array("a" => "apple", "b" => "banana", "c" => "cherry")


$result = ($array1 == $array2); // false

$result = ($array1 === $array2); // false

$result = ($array1 != $array2); // true

$result = ($array1 !== $array2); // true



$result = ($array1 != $array2); // true




$x = 10;

if ($x < 10) {
    echo "Less than 10";
} elseif ($x == 10) {
    echo "Equal to 10";
} else {
    echo "Greater than 10";
}

for ($i = 0; $i < 10; $i++) {
    echo $i;
}

$i = 0;
while ($i < 10) {
    echo $i;
    $i++;
}

$i = 0;
do {
    echo $i;
    $i++;
} while ($i < 10);

$array = array(1, 2, 3, 4);
foreach ($array as $value) {
    echo $value;
}


for ($i = 0; $i < 10; $i++) {
    if ($i % 2 == 0) {
        continue; // Skip even numbers
    }
    echo $i;
}

for ($i = 0; $i < 10; $i++) {
    if ($i == 5) {
        break; // Exit the loop when $i is 5
    }
    echo $i;
}

$x = 10;
switch ($x) {
    case 1:
        echo "One";
        break;
    case 10:
        echo "Ten";
        break;
    default:
        echo "Neither one nor ten";
}

$x = 10;
$result = match ($x) {
    1 => "One",
    10 => "Ten",
    default => "Neither one nor ten",
};
echo $result;


function sayHello() {
    return "Hello, World!";
}

echo sayHello(); // Outputs: Hello, World!


?>

<?php
function greet($name) {
    return "Hello, $name!";
}
?>

<?php
include 'functions.php';

echo greet("Alice"); // Outputs: Hello, Alice!
?>

<?php
// function add(int $a, int $b): int {
//     return $a + $b;
// }

// echo add(2, 3); // Outputs: 5
?>

<?php
// function add($a, $b) {
//     return $a + $b;
// }

// echo add(2, 3); // Outputs: 5
?>

<?php
function gret($name = "Guest") {
    return "Hello, $name!";
}

echo gret(); // Outputs: Hello, Guest!
echo gret("Alice"); // Outputs: Hello, Alice!
?>

<?php
function createUser($name, $age) {
    return "Name: $name, Age: $age";
}

echo createUser(age: 25, name: "Alice"); // Outputs: Name: Alice, Age: 25
?>

<?php
function sum(...$numbers) {
    return array_sum($numbers);
}

echo sum(1, 2, 3, 4); // Outputs: 10
?>


<?php
$globalVar = "I'm global";

function tes4t() {
    global $globalVar;
    echo $globalVar; // Outputs: I'm global
}

tes4t();
?>


<?php
// function test() {
//     $localVar = "I'm local";
//     echo $localVar; // Outputs: I'm local
// }

// test();
?>

<?php
function test() {
    static $count = 0;
    $count++;
    echo $count;
}

test(); // Outputs: 1
test(); // Outputs: 2
?>

<?php
function add($a, $b) {
    return $a + $b;
}
?>


<?php
$greet = function($name) {
    return "Hello, $name!";
};

echo $greet("Alice"); // Outputs: Hello, Alice!
?>
<?php
$greet = fn($name) => "Hello, $name!";

echo $greet("Alice"); // Outputs: Hello, Alice!
?>
<?php
$numbers = [1, 2, 3, 4];
$squared = array_map(fn($n) => $n * $n, $numbers);
print_r($squared); // Outputs: [1, 4, 9, 16]
?>

<?php
$numbers = [1, 2, 3, 4];
$evens = array_filter($numbers, fn($n) => $n % 2 == 0);
print_r($evens); // Outputs: [2, 4]
?>

<?php
$numbers = [1, 2, 3, 4];
$sum = array_reduce($numbers, fn($carry, $n) => $carry + $n, 0);
echo $sum; // Outputs: 10
?>

<!DOCTYPE html>
<html>
<body>

<form method="get" action="process.php">
  Name: <input type="text" name="name">
  <input type="submit">
</form>

</body>
</html>

<?php
$name = $_GET['name'];
echo "Name: " . htmlspecialchars($name);
?>

<?php
$name = "Alice";
if (isset($name)) {
    echo "Name is set.";
} else {
    echo "Name is not set.";
}
?>


<?php
$name = "Alice";
var_dump($name); // Outputs: string(5) "Alice"
?>


<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name">
  Email: <input type="text" name="email">
  <input type="submit">
</form>

<?php
$name = $email = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        echo "Name is required.<br>";
    } else {
        $name = htmlspecialchars($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        echo "Email is required.<br>";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.<br>";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }
    
    if (!empty($name) && !empty($email)) {
        echo "Name: $name<br>";
        echo "Email: $email<br>";
    }
}
?>

</body>
</html>

<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name">
  Email: <input type="text" name="email">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        echo htmlspecialchars($key) . ": " . htmlspecialchars($value) . "<br>";
    }
}
?>

</body>
</html>


<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select file to upload:
  <input type="file" name="fileToUpload">
  <input type="submit" value="Upload File">
</form>

</body>
</html>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select files to upload:
  <input type="file" name="filesToUpload[]" multiple>
  <input type="submit" value="Upload Files">
</form>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    foreach ($_FILES["filesToUpload"]["name"] as $key => $name) {
        $target_file = $target_dir . basename($name);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists: $name.<br>";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["filesToUpload"]["size"][$key] > 500000) {
            echo "Sorry, your file is too large: $name.<br>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed: $name.<br>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded: $name.<br>";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$key], $target_file)) {
                echo "The file $name has been uploaded.<br>";
            } else {
                echo "Sorry, there was an error uploading your file: $name.<br>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="process.php" method="post" enctype="multipart/form-data">
  Name: <input type="text" name="name">
  Email: <input type="text" name="email">
  Profile Picture: <input type="file" name="profilePicture">
  <input type="submit" value="Submit">
</form>

</body>
</html>
<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty($_POST['username'])) {
        $errors[] = "Username is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['username'])) {
        $errors[] = "Username can only contain letters and numbers.";
    }

    // Validate email
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }

    // Validate file upload
    if (isset($_FILES['fileToUpload'])) {
        $file = $_FILES['fileToUpload'];
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $errors[] = "Error uploading file.";
        }
    } else {
        $errors[] = "File upload is required.";
    }

    // If no errors, process the data
    if (empty($errors)) {
        $uploadDir = 'uploads/';
        $tmpName = $file['tmp_name'];
        $name = basename($file['name']);
        
        // Move the uploaded file
        move_uploaded_file($tmpName, $uploadDir . $name);
        
        echo "Form submitted successfully!<br>";
        echo "Username: " . htmlspecialchars($_POST['username']) . "<br>";
        echo "Email: " . htmlspecialchars($_POST['email']) . "<br>";
        echo "File uploaded successfully: " . htmlspecialchars($name);
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

<?php
$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}
?>

<?php
$sql = "INSERT INTO users (name, email) VALUES ('John Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

<?php
$sql = "UPDATE users SET email='john.doe@example.com' WHERE name='John Doe'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

<?php
$sql = "DELETE FROM users WHERE name='John Doe'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>





















































































































































































































































