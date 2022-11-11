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
            $guests = (array) json_decode(file_get_contents('guests.json'), true);
            $guests = array_reverse($guests, true);
            foreach ($guests as $guest) {
                $id = $guest['id'];
                $name = $guest['name'];
                $message = $guest['message'];
                $time = $guest['time'];
                echo('
                <div class="guest">
                    <button class="delete-message" onclick="deleteMessage(\''.$id.'\')"><img src="assets/bin.svg" width="12px" alt="">Delete</button>
                    <p class="name"><img class="svg" src="assets/person.svg">'.$name.' <span style="color: gray;">at '.date("d/M/Y h:i:sa", $time).'</span></p>
                    <p class="message"><img class="svg" src="assets/message.svg">'.$message.'</p>
                </div>
                ');
            }
            ?>
        </div>
    </div>
</body>
</html>

<script>

    window.addEventListener("scroll", (event) => {
        let scroll = this.scrollY;
        console.log(scroll)

        let button = document.getElementById('add');


        if (scroll >= 70) {
            console.log('ass');
            button = button.textContent.replace('Add', ' ');
        } else {
            console.log('nah');
            button = button.textContent.replace(' ', 'Ass');
        }
    });

    function deleteMessage(id) {
        if (confirm('Are you sure you want to delete this message?') == false) {
            return 0
        } else {
            window.location = 'delete.php?delid=' + id;
        }
    }

</script>