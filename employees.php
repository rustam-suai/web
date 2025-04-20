<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Сотрудники</title>
    <link rel="stylesheet" href="style1.css">
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
    <link rel="stylesheet" href="style2.css">
	<div class="page">
	    <div class="block0">
	    	<ul class="nav">
	            <li><a class="buttons" href="index.php">Серии</a></li>
	            <li><a class="buttons" href="projects.php">Проекты</font></a></li>
	            <li><a class="buttons" href="ref.php">Наборы ресурсов</font></a></li>
		        <li><a class="mainbuttons" href="employees.php">Сотрудники</font></a></li>
		        <li><a class="buttons" href="sponsors.php">Спонсоры</font></a></li>
	        </ul>
	    </div>

	    <div class="container">
	        <div class="block1"><p><a target="_blank" href="http://www.ligainternet.ru/encyclopedia-of-security/parents-and-teachers/parents-and-teachers-detail.php?ID=639"><img src="https://i.ibb.co/N1scwLJ/lbii.png"></a>
	        &nbsp;
	            <div class="weather">
	                <p><a target="_blank" href="https://www.kaspersky.ru/blog/category/tips/"><img src="https://i.ibb.co/DQykkGR/kasp.png"></a>
	            </div>
	            <p style="margin-top: 100px;"><a target="_blank" href="https://xn--80aaefw2ahcfbneslds6a8jyb.xn--p1ai/"><img src="https://i.ibb.co/5n6pvK5/cg.png"></a>
	    </div>

	    <div class="block2">
                

                <?php
            // include the database conn file
            include 'db.php';

            if(isset($_POST['add_employee'])) {

                $name = $_POST['name'];
                $position = $_POST['position'];
                $login = $_POST['login'];
                $pass = $_POST['pass'];

                // check if the input is valid
                if(empty($name) || empty($position)|| empty($login) || empty($pass)) {
                    echo '<p>Пожалуйста, заполните все поля.</p>';
                } else {
                    // prepare the query to insert data into the table
                    $query = "INSERT INTO employees (name, position, login, pass) VALUES ('$name', '$position', '$login', '$pass')";

                    // execute the query
                    $result = mysqli_query($conn, $query);

                    // check if the query was successful
                    if($result) {
                        echo '<p>Данные успешно добавлены в таблицу "Сотрудники".</p>';
                    } else {
                        echo '<p>Ошибка при добавлении данных в таблицу "Сотрудники": ' . mysqli_error($conn) . '</p>';
                    }
                }
            }


            // check if delete user button is clicked
            if(isset($_POST['delete_employee'])) {
                $emp_id = $_POST['id'];
                $delete_query = "DELETE FROM employees WHERE id = $emp_id";
                $delete_result = mysqli_query($conn, $delete_query);
                if($delete_result) {
                    echo '<p>Сотрудник успешно удален.</p>';
                } else {
                    echo '<p>Ошибка при удалении сотрудника: ' . mysqli_error($conn) . '</p>';
                }
            }
            
            // set the default query
            $query = "SELECT * FROM employees";

            // execute the query
            $result = mysqli_query($conn, $query);

            // check if the query was successful
            if (!$result) {
                die('Error: ' . mysqli_error($conn));
            }

            // display the results in a table format
            echo '<table>';
            echo '<tr><th>ФИО</th><th>Должность</th><th>Логин</th><th>Пароль</th></tr>';
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['position'] . '</td>';
                echo '<td>' . $row['login'] . '</td>';
                echo '<td>' . $row['pass'] . '</td>';

                echo '<td><form method="POST" action=""><input type="hidden" name="id" value="' . $row['id'] . '"><input type="submit" name="delete_employee" value="Удалить"></form></td>';
                echo '</tr>';
            }
            echo '</table>';

            echo '<h2>Добавить нового сотрудника:</h2>';
            echo '<form method="POST" action="">';
            echo '<label>ФИО:</label><br>';
            echo '<input type="text" name="name"><br>';
            echo '<label>Должность:</label><br>';
            echo '<input type="text" name="position"><br>';
            echo '<label>Логин:</label><br>';
            echo '<input type="text" name="login"><br>';
            echo '<label>Пароль:</label><br>';
            echo '<input type="text" name="pass"><br>';
            
            echo '<br>';
            echo '<input type="submit" name="add_employee" value="Добавить"><br>';

            // close the database connection
            mysqli_close($conn);
        ?>

        </div>

	</div>
</body>
</html>
