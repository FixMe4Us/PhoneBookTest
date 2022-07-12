<?php
    include ('connect.php');
    $name = htmlentities(trim($_POST['name']));
    $number_phone = htmlentities(trim($_POST['number_phone']));

    if (isset($name) && isset($number_phone)) {
        $sql = "INSERT INTO `phone` (name, number_phone) 
                VALUES ('$name', '$number_phone')";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            $errorPost = "Произошла ошибка при отправке данных!" . mysqli_error($link); 
        }
        else {
            $donePost = "Данные успешно добавлены!";
        }
    }
    mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Провека добавления</title>
	<meta charset="UTF-8">
</head>
<body>
    <h1>
        <?php
            if (!$result) {
                echo($errorPost);
            }
            else {
                 echo($donePost); 
                    }
            ?>
    </h1>
    
    <form action="create_phone.php">
        <button>
            Добавить еще
        </button>
    </form>

    <form action="index.php">
        <button>
            Вернуться к телефонной книге
        </button>
    </form>

</body>
</html>