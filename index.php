<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <div class="container">
        <form action="createPDF.php" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Enter your name">
            <input type="email" name="email" placeholder="Enter your email">
            <input type="tel" name="phone" placeholder="Enter your contact">
            <input type="file" name="img" id="file-btn">
            <button type="submit" name="submit">Generate Card</button>
        </form>
    </div>
</body>
</html>
