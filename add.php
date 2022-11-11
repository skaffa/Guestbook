<?php

if (isset($_POST['submit'])) {
    validateInput($_POST['name'], $_POST['message']);
}


function validateInput(string $name, string $message) {
    $data = [];
    $data += ['id' => sha1(uniqid())];
    htmlspecialchars($name);
    $data += ['name' => $name];
    htmlspecialchars($message);
    $data += ['message' => $message];
    $data += ['time' => time()];
    storeInput($data);
}

function storeInput($data)  {
    $oldData = json_decode(file_get_contents('guests.json'), true);
    $oldData[] = $data;
    $encodedData = json_encode($oldData, JSON_PRETTY_PRINT);
    file_put_contents('guests.json', $encodedData);
    header('Location: index.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Guest</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/add.css">
</head>
<body>
    <div id="container">
        <h1 style="color: white; text-align: center;">Add someone to the guestbook</h1>
        <form action="" method="post" autocomplete="off">
            <label for="name">Name</label>
            <input type="text" placeholder="Name..." name="name" id="" required>
            <label for="message">Message</label>
            <textarea name="message" placeholder="Message..." id="" cols="30" rows="10" required></textarea>
            <input type="submit" name="submit" id="submit" value="submit">
        </form>
    </div>
</body>
</html>