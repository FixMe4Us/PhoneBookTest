<?php
    include ('connect.php'); 
    
    if (isset($_GET['red_id'])) {
        $sql_select = "SELECT `name`, number_phone FROM phone
                    WHERE id_phone = {$_GET['red_id']}";
            $result_select = mysqli_query($link, $sql_select);
            $row = mysqli_fetch_array($result_select);
    }

    if (isset($_GET['red_id'])) {
        $sql_update = "UPDATE phone SET `name` = '{$_POST['name']}',
            number_phone = '{$_POST['number_phone']}' 
                WHERE id_phone  = {$_GET['red_id']}";
            $result_update = mysqli_query($link, $sql_update);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Изменения</title>
    <meta charset="UTF-8">
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="name" value="<?=isset($_GET['red_id']) ? $row['name'] : ''; ?>">
        <input type="text" name="number_phone" value="<?=isset($_GET['red_id']) ? $row['number_phone'] : ''; ?>">
        <button>Сохранить</button> 
    </form>

    <form action="index.php">
        <button>
            Вернуться к телефонной книге
        </button>
    </form>
</body>
</html>