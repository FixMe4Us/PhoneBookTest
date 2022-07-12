<?php
    include('connect.php');

    if (isset($_GET['del_id'])) {
        $sql_delete = "DELETE FROM `phone` WHERE
            id_phone = {$_GET['del_id']}";
        $result_delete = mysqli_query ($link, $sql_delete);
        if (!$result_delete) {
            echo "Произошла ошибка при удалении!" . mysqli_error($link);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Телефонная книга</title>
	<meta charset="UTF-8">
</head>
<body>
    <form method="POST">
        <input type="text" name="search" placeholder="Имя или номер телефона" value="<?=$_POST['search']; ?>">
        <button>
            Найти
        </button>
    </form>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Имя</th>
                    <th>Номер телефона</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $search = htmlentities(trim($_POST['search']));
                    if(empty($search)) {
                        $result = mysqli_query($link, "SELECT * FROM `phone`");
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<tr>' .
                                    "<td> {$row['id_phone']} </td>" .
                                    "<td> {$row['name']} </td>" .
                                    "<td> {$row['number_phone']} </td>" .
                                    "<td><a href='?del_id={$row['id_phone']}'>Удалить</a></td>" .
                                    "<td><a href='update_phone.php?red_id={$row['id_phone']}'>Изменить</a></td>" .
                                '</tr>';
                        }
                    }
                    else {
                        $sqllike = "SELECT id_phone, `name`, number_phone FROM phone 
                            WHERE `name` LIKE '%$search%' 
                                OR number_phone LIKE '%$search%'";
                        $res = mysqli_query($link, $sqllike);
                        while ($row1 = mysqli_fetch_array($res)) {
                            echo '<tr>' .
                                    "<td> {$row1['id_phone']} </td>" .
                                    "<td> {$row1['name']} </td>" .
                                    "<td> {$row1['number_phone']} </td>" .
                                    "<td><a href='?del_id={$row1['id_phone']}'>Удалить</a></td>" .
                                    "<td><a href='update_phone.php?red_id={$row1['id_phone']}'>Изменить</a></td>" .
                                '</tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <form action="create_phone.php">
        <button>Добавить</button>
    </form>

</body>
</html>