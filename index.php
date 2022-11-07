<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <a href="add.php">Add</a>
    <div id="container">
        <div id="guests">
            <?php
            $guests = json_decode(file_get_contents('guests.json'), true);
            foreach ($guests as $guest) {
                // $guestData = json_decode(file_get_contents($guest));
                $name = $guest['name'];
                $message = $guest['message'];
                echo('
                <div class="guest">
                    <p class="name">'.$name.'</p>
                    <p class="message">'.$message.'</p>
                </div>
                ');
            }
            ?>
        </div>
    </div>
</body>
</html>