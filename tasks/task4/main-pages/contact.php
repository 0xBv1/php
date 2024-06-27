<?php include "/xampp/htdocs/my-php/task4/assets/includs/header.php";?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Car Store</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        <p>We'd love to hear from you! Please fill out the form below to get in touch with us.</p>
    </header>
    <main>
        <form action="process_contact.php" method="post">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </main>
</body>
</html>


<?php include "/xampp/htdocs/my-php/task4/assets/includs/footer.php";?>
