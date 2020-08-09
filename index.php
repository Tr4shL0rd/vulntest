<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $info = pathinfo($_FILES['file']['name']);
        $ext = $info['extension']; // get the extension of the file
        $newname = "file.".$ext; 


        $target = 'images/'.$newname;
        $destination = $_SERVER['DOCUMENT_ROOT'] . "/" . $target;
        move_uploaded_file($_FILES['file']['tmp_name'], $destination);
        header("Location: /?file=" . $newname);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hey</title>
</head>
<body>

    <?php
        $file = $_GET["file"];
        if (isset($_GET["file"])) {
            echo "Uploaded: <a href='/images/$file'>$file</a>";
        }
    ?>

<form enctype="multipart/form-data" method="POST">
    <input name="file" type="file" />
    <button type="submit">Upload</button>
</form>
</body>
</html>
