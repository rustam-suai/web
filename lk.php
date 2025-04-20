<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    <style>
        table {
            border-collapse: separate; /* Разделение границ ячеек для использования border-spacing */
            border-spacing: 10px; /* Расстояние между ячейками */
            font-family: century gothic;
        }

        td {
            padding: 5px; /* Отступ внутри каждой ячейки */
            border: 1px solid #000; /* Граница ячейки (по желанию) */
            font-family: century gothic;
        }

        label {
            font-family: century gothic;
        }

        select{
            font-family: century gothic;
        }
                
        input{
            font-family: century gothic;
        }

        p{
            font-family: century gothic;
        }
        h2{
            font-family: century gothic;
        }
        a{
            font-family: century gothic;
        }
    </style>

</head>

<body bgcolor="D7F9F7">

    <div class="page">
        <div class="block0">
            <ul class="nav">
                <li><a class="buttons" href="index.php">Главная</a></li>
                <li><a class="buttons" href="series.php">Серии</font></a></li>
                <li><a class="buttons" href="projects.php">Проекты</font></a></li>
                <li><a class="buttons" href="ref.php">Контакты</font></a></li>
                <li><a class="buttons" href="sponsors.php">Галерея</font></a></li>
            </ul>
        </div>

        <div class="container">

            <div class="block1" <?php session_start(); if ($_SESSION['user'] == "in"){

                    //echo 'style="display: none"';

                } ?>>
                
                <h2>Фильтр</h2>

                <form method="GET" action="">
                    <label>Фильтр по продолжительности:</label>
                    <input type="text" name="duration" value="<?php echo isset($_GET['duration']) ? $_GET['duration'] : ''; ?>" />
                    <br>
                    <label>Сортировка по номеру:</label>
                    <select name="sort">
                        <option value="no"<?php if(isset($_GET['sort']) && $_GET['sort'] == 'no') { echo ' selected="selected"'; } ?>>-</option>
                        <option value="asc"<?php if(isset($_GET['sort']) && $_GET['sort'] == 'asc') { echo ' selected="selected"'; } ?>>По возрастанию</option>
                        <option value="desc"<?php if(isset($_GET['sort']) && $_GET['sort'] == 'desc') { echo ' selected="selected"'; } ?>>По убыванию</option>
                        
                    </select>
                    
                    <br>

                    <?php
                    include 'db.php';
                    ob_start();
                    $sql = "SELECT id, name FROM employees"; // Предполагая, что столбец с именем сотрудника называется 'name'
                    $result2 = mysqli_query($conn,$sql);
                    echo '<label>Фильтр по режиссёру:</label><br>';
                    echo '<select name="rez" id="rez" size="1">';
                    echo '<option value = "no">-</option>';
                    // Выводим имена сотрудников в выпадающий список
                    while($row = mysqli_fetch_array($result2)) {
                        echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                    }
                    
                    echo '</select>';

                    echo '<br>';

                    $sql = "SELECT id, name FROM projects"; // Предполагая, что столбец с именем сотрудника называется 'name'
                    $result3 = mysqli_query($conn,$sql);
                    echo '<label>Фильтр по проекту:</label><br>';
                    echo '<select name="pro" id="pro" size="1">';
                    echo '<option value = "no">-</option>';
                    // Выводим имена сотрудников в выпадающий список
                    while($row = mysqli_fetch_array($result3)) {
                        echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                    }
                    
                    echo '</select>';

                    echo '<br><br>';

                    ?>

                    <input type="submit" value="Применить" />

                </form>

            </div>

            <div class="block2">
                
            <h2>Добавленные вами серии</h2>
                    <?php

                    



                // include the database conn file
                include 'db.php';
                session_start();
                ob_start();
                $ea = 1;
                
                if(isset($_SESSION['regaut'])){

                }
                else{
                    $_SESSION['regaut'] = "reg";
                }

                $sql = "SELECT id, name FROM employees"; // Предполагая, что столбец с именем сотрудника называется 'name'
                $result2 = mysqli_query($conn,$sql);

                $sql3 = "SELECT id, name FROM projects"; 
                $result3 = mysqli_query($conn,$sql3);

                if(isset($_POST['add_ser'])) {

                    $name = $_POST['name'];
                    $num = $_POST['num'];
                    $duration = $_POST['duration'];
                    $dir = $_POST['dir'];
                    $project = $_POST['project'];

                    // check if the input is valid
                    if(empty($name) || empty($num)|| empty($duration) || empty($dir) ||empty($project)) {
                        echo '<p>Пожалуйста, заполните все поля.</p>';
                    } else {
                        // prepare the query to insert data into the table
                        $query = "INSERT INTO series (name, num, duration, emp_id, project_id) VALUES ('$name', '$num', '$duration', '$dir', '$project')";

                        // execute the query
                        $result = mysqli_query($conn, $query);

                        // check if the query was successful
                        if($result) {
                            echo '<p>Данные успешно добавлены в таблицу "Серии".</p>';
                        } else {
                            echo '<p>Ошибка при добавлении данных в таблицу "Серии": ' . mysqli_error($conn) . '</p>';
                        }
                    }
                }

                if(isset($_POST['edit_ser_y'])) {

                    $name = $_POST['name'];
                    $num = $_POST['num'];
                    $duration = $_POST['duration'];
                    $dir = $_POST['dir'];
                    $project = $_POST['project'];

                    // check if the input is valid
                    if(empty($name) || empty($num)|| empty($duration) || empty($dir) ||empty($project)) {
                        echo '<p>Пожалуйста, заполните все поля.</p>';
                    } else {
                        if (isset($_SESSION['edit_ser_id'])) {
                            
                            $my_id = $_SESSION['edit_ser_id'];
                        }
                        // prepare the query to insert data into the table
                        $query = "UPDATE series SET name = '$name', num = '$num', duration = '$duration', emp_id = '$dir', project_id = '$project' WHERE id = '$my_id'";
                        echo '<br>вот айди наш ';
                        echo $my_id;
                        echo '<br>';
                        echo $my_id;
                        echo '<br>';
                        // execute the query
                        $result = mysqli_query($conn, $query);

                        // check if the query was successful
                        if($result) {
                            echo '<p>Данные успешно изменены.</p>';
                        } else {
                            echo '<p>Ошибка при изменении данных: ' . mysqli_error($conn) . '</p>';
                        }
                    }
                    $ea = 1;
                }

                if (isset($_POST['to_rate'])){
                    $rating = intval($_POST['rating']);
                    $idd = $_POST['id_rate'];
                    
                    if (empty($rating)){

                    }
                    else{
                        if ($rating>=0 && $rating<=100){
                            $needid = $_SESSION['id_user'];
                            $queryr = "UPDATE busket SET mark = $rating WHERE id_ser = $idd AND id_user = $needid";
                            
                            $rate_result = mysqli_query($conn, $queryr);
                            if($rate_result) {
                                echo '<p>Оценка поставлена.</p>';
                            } else {
                                echo '<p>Ошибка при оценивании: ' . mysqli_error($conn) . '</p>';
                            }
                        }

                    }
                }


                if(isset($_POST['dlt_from_list'])){
                    $ser_id = intval($_POST['id']);
                    $delete_query = "DELETE FROM busket WHERE id_ser = $ser_id";
                    $delete_result = mysqli_query($conn, $delete_query);
                    if($delete_result) {
                        echo '<p>Серия успешно удалена.</p>';
                    } else {
                        echo '<p>Ошибка при удалении серии: ' . mysqli_error($conn) . '</p>';
                    }

                }

                // check if delete user button is clicked
                if(isset($_POST['delete_ser'])) {
                    $ser_id = $_POST['id'];
                    $delete_query = "DELETE FROM series WHERE id = $ser_id";
                    $delete_result = mysqli_query($conn, $delete_query);
                    if($delete_result) {
                        echo '<p>Серия успешно удалена.</p>';
                    } else {
                        echo '<p>Ошибка при удалении серии: ' . mysqli_error($conn) . '</p>';
                    }
                }

                if(isset($_POST['edit_ser'])) {
                    $ea = -1;
                    $edit_ser_id = $_POST['id'];
                    $_SESSION['edit_ser_id'] = $edit_ser_id;
                    echo 'тут айди равен ';
                    echo $edit_ser_id;
                }


                //echo $_SESSION['id_user'];
                // set the default query
                $impid= $_SESSION['id_user'];
                //echo $impid;
                $query = "SELECT * FROM series WHERE id IN (SELECT id_ser FROM busket WHERE id_user = $impid)";
                //$query = "SELECT * FROM series";
                            // check if the quantity filter is applied
                //echo $query;



                
                if(isset($_GET['duration'])) {
                    $dur = (int)$_GET['duration'];
                    if($dur > 0) {
                        $query .= " AND duration = $dur";
                    }
                }

                if(isset($_GET['rez'])) {
                    $rez = (int)$_GET['rez'];
                    if($rez > 0) {
                        $query .= " AND emp_id = $rez";
                    }
                }

                if(isset($_GET['pro'])) {
                    $pro = (int)$_GET['pro'];
                    if($pro > 0) {
                        $query .= " AND project_id = $pro";
                    }
                }
                // check if the sort option is applied
                if(isset($_GET['sort'])) {
                    $sort = $_GET['sort'];
                    if ($sort == 'no'){

                    }
                    else{
                        $sort = $_GET['sort'] == 'asc' ? 'ASC' : 'DESC';
                        $query .= " ORDER BY num $sort";
                    }
                }

            

                // execute the query
                $result = mysqli_query($conn, $query);

                // check if the query was successful
                if (!$result) {
                    die('Error: ' . mysqli_error($conn));
                }

                // display the results in a table format
                echo '<table>';
                echo '<tr><th>Название</th><th>Номер</th><th>Продолжительность</th><th>Режиссёр</th><th>Проект</th><th>Оценка</th></tr>';
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['num'] . '</td>';
                    echo '<td>' . $row['duration'] . '</td>';

                    $sql4 = intval($row['emp_id']);
                    $nq = "SELECT name FROM employees WHERE id = $sql4";
                    $itog = mysqli_query($conn, $nq);
                    $row2 = mysqli_fetch_assoc($itog);
                    echo '<td>' .htmlspecialchars($row2['name']). '</td>';

                    $sql5 = intval($row['project_id']);
                    $nq2 = "SELECT name FROM projects WHERE id = $sql5";
                    $itog2 = mysqli_query($conn, $nq2);
                    $row3 = mysqli_fetch_assoc($itog2);

                    echo '<td>' .htmlspecialchars($row3['name']). '</td>';

                    $sqlm = intval($row['id']);
                    $nqm = "SELECT mark FROM busket WHERE id_ser = $sqlm AND id_user = $impid";
                    $itogm = mysqli_query($conn, $nqm);
                    $rowm = mysqli_fetch_assoc($itogm);
                    
                    $_SESSION['ser_id'] = $sqlm;
                    
                    echo '<td><form method="POST" style="text-align: left;">
                            <input type="text" style="width:90%;" name="rating" value="'.htmlspecialchars($rowm['mark']).'"></input><br>
                            <input type="hidden" name="id_rate" value="' . $sqlm . '"></input>
                            <input style="width:100%;"  type="submit" name="to_rate" value="Оценить"></input>
                        </form></td>';

                    if ($_SESSION['user'] == "in"){

                        $rsql = ($row['id']);
                        $usql = ($_SESSION['id_user']);
                        $nq3 = "SELECT id FROM busket WHERE (id_ser = $rsql AND id_user = $usql)";
                        $itog3 = mysqli_query($conn, $nq3);
                        $row4 = mysqli_fetch_assoc($itog3);
                        
                        echo '<td><form method="POST" action=""><input type="hidden" name="id" value="' . $row['id'] . '"><input type="submit" name="dlt_from_list" value="-"></form></td>';

                    }
                    echo '</tr>';
                }
                echo '</table>';
               


                function login_user($login, $pass){
                    global $conn;
                    $f_query = "SELECT login FROM users WHERE login = '$login' AND pass = '$pass'";
                    
                
                    $login_query = mysqli_query($conn, $f_query);
                    if (empty($login_query)){

                    }
                    else{
                        $f_result = mysqli_fetch_array($login_query);
                        if(empty($f_result)){
                            echo "Ошибка авторизации";
                        }
                        else{
                            $_SESSION['user'] = "in"; 
                            $_SESSION['the_login'] = $login;
                            //header("Refresh:0");
                        }
                    }
                    $f_query2 = "SELECT id FROM users WHERE login = '$login' AND pass = '$pass'";
                    //$f_query2 = "SELECT * FROM users WHERE login = 'pain' AND pass = 'itami'";
                    $id_query = mysqli_query($conn, $f_query2);

                    if (empty($id_query)){
                        echo 'kuku';
                    }
                    else{
                        $f_result2 = mysqli_fetch_array($id_query);
                        
                        if(empty($f_result2)){
                            echo "Ошибка корзины";
                        }
                        else{ 
                            $_SESSION['id_user'] = intval($f_result2['id']);
                            $asad=intval($f_result2['id']);
                            //header("Refresh:0");
                        }
                    }

                }
            
                 
            ?>

            </div>


            <div class="block3">
                

                <?php
            // include the database conn file
            include 'db.php';
            session_start();
            if(isset($_POST['save'])) {

                $login = $_POST['login'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];

                // check if the input is valid
                if(empty($login) || empty($pass)|| empty($email) ) {
                    echo '<p>Пожалуйста, заполните все поля.</p>';
                } else {
                    if (isset($_SESSION['save'])) {
                        
                        $my_id = $_SESSION['save'];
                    }
                    // prepare the query to insert data into the table
                    $temp = $_SESSION['the_login'];
                    $query = "UPDATE users SET login = '$login', pass = '$pass', email = '$email' WHERE login = '$temp'";
                    echo $my_id;
                    echo '<br>';
                    echo $my_id;
                    echo '<br>';
                    // execute the query
                    $result = mysqli_query($conn, $query);

                    // check if the query was successful
                    if($result) {
                        echo '<p>Данные успешно изменены.</p>';
                    } else {
                        echo '<p>Ошибка при изменении данных: ' . mysqli_error($conn) . '</p>';
                    }
                }
            }

            if (isset($_POST["back"]))
                {
                    header("Location: /index.php");
                    
                }


            // check if delete user button is clicked
            
            // set the default query
            $tmp = $_SESSION['the_login'];
            $query = "SELECT * FROM users WHERE login = '$tmp' ";

            // execute the query
            $result = mysqli_query($conn, $query);

            // check if the query was successful
            if (!$result) {
                die('Error: ' . mysqli_error($conn));
            }

            // display the results in a table format
            echo '<h2>Ваши данные</h2>';
            echo '<table>';
            echo '<tr><th>Логин</th><th>Пароль</th><th>E-Mail</th></tr>';
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td>' . $row['login'] . '</td>';
                echo '<td>' . $row['pass'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';

            echo '<h2>Изменение данных:</h2>';
            echo '<form method="POST" action="">';
            echo '<label>Логин:</label><br>';
            echo '<input type="text" name="login"><br>';
            echo '<label>Пароль:</label><br>';
            echo '<input type="text" name="pass"><br>';
            echo '<label>E-Mail:</label><br>';
            echo '<input type="text" name="email"><br>';
            
            echo '<br>';
            echo '<input type="submit" name="save" value="Сохранить"><br>';

            echo '<br><br>';
            echo '<input type="submit" name="back" value="Назад"><br>';

            // close the database connection
            mysqli_close($conn);
        ?>

        </div>
        </div>
    </div>

</body>

</html>