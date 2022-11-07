<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <a href="add.php" id="add"><img src="assets/add.svg" width="14px">Add</a>
    <div id="container">
        <h1 style="text-align: center;">Guestbook</h1>
        <div id="guests">
            <?php
            $guests = json_decode(file_get_contents('guests.json'), true);
            foreach ($guests as $guest) {
                $name = $guest['name'];
                $message = $guest['message'];
                echo('
                <div class="guest">
                    <p class="name"><img class="svg" src="assets/person.svg">'.$name.'</p>
                    <p class="message"><img class="svg" src="assets/message.svg">'.$message.'</p>
                </div>
                ');
            }
            ?>
        </div>
    </div>
</body>
</html>