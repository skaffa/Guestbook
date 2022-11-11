<?php
if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $data = (array) json_decode(file_get_contents('guests.json'));
    
    foreach ($data as $key => $item) {
        if ($item->id == $id) {
            unset($data[$key]);
            file_put_contents('guests.json', json_encode($data));
        }
    }
}

header('Location: index.php');

?>