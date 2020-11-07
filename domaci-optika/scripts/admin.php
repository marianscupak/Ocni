<?php
    if (isset($_POST['submitAdd'])) {
        require("database.php");

        $files = $_FILES['files'];
        $fileCount = count($files['name']);

        $sql = "SELECT id_glasses FROM glasses ORDER BY id_glasses DESC LIMIT 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if (isset($row)) {
            $id = $row['id_glasses'] + 1;
        }
        else {
            $id = 1;
        }

        $sql = "INSERT INTO glasses(id_glasses, name, price, gender, img_count)
                VALUES('" . $id . "', '" . $_POST['name'] . "', '" . $_POST['price'] . "', '" . $_POST['gender'] . "', '" . $fileCount . "')";

        if ($conn->query($sql) == TRUE) {
            for ($i = 1; $i <= $fileCount; $i++) {
                move_uploaded_file($files['tmp_name'][$i - 1], "../assets/img/glasses/glasses_" . $id . "_" . $i . ".jpg");
            }
            header("Location: ../admin.php?add=1");
        }
        else {
            echo "Error: ".$sql."<br>".$conn->error;
        }
    }
    if (isset($_GET['del'])) {
        require("database.php");
        $sql = "DELETE FROM glasses WHERE id_glasses ='" . $_GET['del'] . "'";
        $conn->query($sql);

        array_map('unlink', glob("../assets/img/glasses/glasses_" . $_GET['del'] . "_*"));
        header("Location: ../admin.php?del=1");
    }