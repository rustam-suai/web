<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>Главная</title>
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
                <li><a class="mainbuttons" href="index.php">Главная</a></li>
                <li><a class="buttons" href="series.php">Серии</font></a></li>
                <li><a class="buttons" href="projects.php">Проекты</font></a></li>
                <li><a class="buttons" href="ref.php">Контакты</font></a></li>
    	        
    	        <li><a class="buttons" href="sponsors.php">Галерея</font></a></li>
            </ul>
        </div>

        <div class="container">

            <div class="block1" <?php session_start(); if (
                    //$_SESSION['user'] == "in"
                    1
                ){

                    echo 'style="display: none"';

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
                

                    <?php

                    



                // include the database conn file
                include 'db.php';
                session_start();
                $ea = 1;
                if (
                    //$_SESSION['user'] == "in"
                    1
                ){

                    echo '<h1>Карандаш - Анимационная Студия</h1>';
                    echo '<p class="text1"><img  src="logo.webp" class="imga">Анимационная студия "Карандаш" — это творческая команда, специализирующаяся на создании анимационных проектов для разных аудиторий. Мы объединяем классические и современные техники, чтобы создавать оригинальные и увлекательные истории. Наша цель — донести эмоции и идеи через анимацию, делая каждую работу уникальной и запоминающейся. “Карандаш” — это место, где каждая деталь важна, и каждая линия обретает жизнь.</p>
';
                    echo '<video width="640" height="360" controls autoplay loop muted poster="poster.jpg"><source src="naruto.mp4" type="video/mp4"></video>';
                }
                        else{
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


                
                // set the default query
                $query = "SELECT * FROM series";

                            // check if the quantity filter is applied
                if(isset($_GET['duration'])) {
                    $dur = (int)$_GET['duration'];
                    if($dur > 0) {
                        $query .= " WHERE duration = $dur";
                    }
                }

                if(isset($_GET['rez'])) {
                    $rez = (int)$_GET['rez'];
                    if($rez > 0) {
                        $query .= " WHERE emp_id = $rez";
                    }
                }

                if(isset($_GET['pro'])) {
                    $pro = (int)$_GET['pro'];
                    if($pro > 0) {
                        $query .= " WHERE project_id = $pro";
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
                echo '<tr><th>Название</th><th>Номер</th><th>Продолжительность</th><th>Режиссёр</th><th>Проект</th></tr>';
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

                    echo '<td><form method="POST" action=""><input type="hidden" name="id" value="' . $row['id'] . '"><input type="submit" name="edit_ser" value="Изменить"></form></td>';

                    echo '<td><form method="POST" action=""><input type="hidden" name="id" value="' . $row['id'] . '"><input type="submit" name="delete_ser" value="Удалить"></form></td>';
                    echo '</tr>';
                }
                echo '</table>';

                echo '<h2>'; 
                if ($ea == 1){
                    echo 'Добавить новую серию:';
                    }
                if ($ea == -1){
                    echo 'Изменить данные о серии';
                    }
                echo '</h2>';
                echo '<form method="POST" action="">';
                echo '<label>Название:</label><br>';
                echo '<input type="text" name="name"><br>';
                echo '<label>Номер:</label><br>';
                echo '<input type="text" name="num"><br>';
                echo '<label>Продолжительность:</label><br>';
                echo '<input type="text" name="duration"><br>';
                echo '<label>Режиссёр:</label><br>';
                // Проверяем, есть ли результаты
                
                echo '<select name="dir" id="dir" size="1">';

                // Выводим имена сотрудников в выпадающий список
                while($row = mysqli_fetch_array($result2)) {
                    echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                }
                
                echo '</select>';

                echo '<br>';

                echo '<label>Проект:</label><br>';
                // Проверяем, есть ли результаты
                
                echo '<select name="project" id="project" size="1">';

                // Выводим названия компаний в выпадающий список
                while($row = mysqli_fetch_array($result3)) {
                    echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                }
                
                echo '</select>';

                echo '<br><br>';
                
                if ($ea == 1){
                    echo '<input type="submit" name="add_ser" value="Добавить"><br>';
                }
                if ($ea == -1){
                    echo '<input type="submit" name="edit_ser_y" value="Изменить"><br>';
                }
                // close the database connection
               


               
            }
                 
            ?>


            <?php 

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
                if ($_SESSION['user'] != "in"){
                    if ($_SESSION['regaut']=="reg"){
                    echo '<form method="POST" style="text-align: left;">
                            <h2>Регистрация</h2> 
                            E-Mail:<br><input type="text" style="width:100%;" name="email_register_input" > <br>
                            Логин:<br><input type="text" style="width:100%;" name="login_register_input"> <br>
                            Пароль:<br><input type="password" style="width:100%;" name="password_register_input" > <br>
                            <br>
                            <input style="width:100%;"  type="submit" name="do_register_btn" value="Зарегистрироваться и войти"></input> 
                            <br><br>
                            <input style="width:100%;"  type="submit" name="to_auth_btn" value="Авторизация"></input> 
                        </form>';
                    }
                    else{
                        echo '<form method="POST" style="text-align: left;">
                            <h2>Авторизация</h2> 
                            Логин:<br><input type="text" style="width:100%;" name="login_aut_input"> <br>
                            Пароль:<br><input type="password" style="width:100%;" name="password_aut_input" > <br>
                            <br>
                            <input style="width:100%;"  type="submit" name="run_auth_btn" value="Войти"></input> 
                            <br><br>
                            <input style="width:100%;"  type="submit" name="to_reg_btn" value="Регистрация"></input> 
                        </form>';
                    }
                }
                else{
                    $tmp = $_SESSION['the_login'];
                    echo '<form method="POST" style="text-align: left;">
                            <h2>';
                    echo $tmp;
                    echo '</h2>'; 
                    echo '
                            <input style="width:100%;"  type="submit" name="to_lk_btn" value="Личный кабинет"></input> 
                            <br><br>
                            <input style="width:100%;"  type="submit" name="exit_btn" value="Выход"></input> 
                        </form>';
                }

                if (isset($_POST["to_lk_btn"]))
                {
                    header("Location: /lk.php");
                    
                }

                if (isset($_POST["exit_btn"]))
                {
                    $_SESSION['user'] = "out";
                    $_SESSION['page'] = "index";
                    header("Refresh:0");
                    
                }

                if (isset($_POST["to_auth_btn"]))
                {
                    $_SESSION['regaut'] = "aut";

                    header("Refresh:0");
                }



                if (isset($_POST["to_reg_btn"]))
                {
                    $_SESSION['regaut'] = "reg";
                    header("Refresh:0");
                    
                }

                if (isset($_POST["run_auth_btn"]))
                {
                    if (empty($_POST["login_aut_input"]) || empty($_POST["password_aut_input"]))
                        echo "Пожалуйста, заполните все поля!";
                    else
                    {   
                        //echo $_POST["login_register_input"]."<br>";
                        //echo $_POST["password_register_input"]."<br>";
                        //echo $_POST["email_register_input"]."<br>";
                        
                        $login = $_POST["login_aut_input"];
                        $pass = $_POST["password_aut_input"];
                        
                        login_user($login, $pass);
                        
                    }
                    header("Refresh:0");
                }

                if (isset($_POST["do_register_btn"]))
                {
                    if (empty($_POST["login_register_input"]) || empty($_POST["password_register_input"]) || empty($_POST["email_register_input"]))
                        echo "Пожалуйста, заполните все поля!";
                    else
                    {   
                        //echo $_POST["login_register_input"]."<br>";
                        //echo $_POST["password_register_input"]."<br>";
                        //echo $_POST["email_register_input"]."<br>";
                        
                        $login = $_POST["login_register_input"];
                        $pass = $_POST["password_register_input"];
                        $email = $_POST["email_register_input"];
                        
                        $query = "SELECT login FROM users WHERE login = '$login' UNION SELECT login FROM employees WHERE login = '$login'";
                        

                        $m_query = mysqli_query($conn, $query);
                        if (!empty($m_query))

                            $res=mysqli_fetch_array($m_query);
                        
                        if (!empty($res))   
                        {
                            echo "Пользователь с таким логином уже зарегистрирован!";
                        }
                        else    
                        {
                            $_SESSION['login_in'] = $res;
                            $query = 
                            "INSERT INTO users (login, pass, email) VALUES ('$login', '$pass', '$email')";
                            //echo $query;
                            $m_query = mysqli_query($conn, $query);
                            login_user($login, $pass);

                        }
                        
                    }
                    header("Refresh:0");
                }
                mysqli_close($conn);
                ?>


            </div>

        </div>
    </div>

</body>

</html>