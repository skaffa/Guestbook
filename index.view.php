<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="notifications.css">



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
</head>
<body>
    <div id="container">
        <div>
            <form action="" id="form" method="post">
                <div class="form-floating mb-3">
                    <input class="form-control" placeholder="Name" name="name" minlength="2" maxlength="50" type="text" required>
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Message" minlength="2" maxlength="500" name="message" id="" required></textarea>
                    <label for="message">Message</label>
                </div>
                <button class="btn btn-outline-primary" id="submit" onclick="validate('#ff2d00', 'Please make sure all fields are valid!')" type="submit">Submit</button>
            </form>
            <div id="notifications">
                <!-- <img id="book" src="book.svg" alt=""> -->
            </div>
        </div>
        <main>


            <?php
            $messages = (array) json_decode(file_get_contents('guestbook.json'));
            foreach ($messages as $message) {
                $id = $message->id;
                $name = $message->userName;
                $timestamp = $message->timestamp;
                $time = date("d/M/Y h:i:sa", $timestamp);
                $msg = $message->message;

                echo('
                <article>
                    <div class="message-info">
                        <div class="name">'.$name.'</div>
                        <div class="time">'.$time.'</div>
                    </div>
                    <div class="message">'.$msg.'</div>
                    <button class="delete-button" onclick="deleteMessage(\''.$id.'\')"><img src="bin.svg" width="12px" alt="">Delete</button>
                </article>
                ');
            }
            ?>
        </main>
    </div>
</body>
</html>

<script>
    function deleteMessage(id) {
        if (confirm('Are you sure you want to delete this message?') == false) {
            return 0
        } else {
            window.location = 'index.php?delid=' + id;
        }
    }
</script>

<script>
    function validate(color, message) {
        if (document.getElementById('form').reportValidity() == false) {
            notify(color, message);
        }
    }

    function notify(color, message) {
        console.log('Creating notification');

        let id = 'ID' + Math.floor(Math.random() * 999999);;

        const newDiv = document.createElement("div");
        const newContent = document.createTextNode(message);
        newDiv.appendChild(newContent);
        newDiv.setAttribute("id", id);
        const currentDiv = document.getElementById("div1");
        newDiv.style.backgroundColor = color + '9b';
        newDiv.setAttribute('onclick', 'document.getElementById(\'' + id + '\').remove();');
        document.getElementById('notifications').insertBefore(newDiv, currentDiv);

        var delayInMilliseconds = 3500; //3.5 seconds
        setTimeout(function() {
        document.getElementById(id).remove();
        }, delayInMilliseconds);
    }
</script>