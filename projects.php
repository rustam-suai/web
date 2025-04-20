<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    <meta charset="utf-8">
    <title>Проекты</title>
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
                <li><a class="buttons" href="index.php">Главная</a></li>
                <li><a class="buttons" href="series.php">Серии</font></a></li>
                <li><a class="mainbuttons" href="projects.php">Проекты</font></a></li>
                <li><a class="buttons" href="ref.php">Контакты</font></a></li>
        	    <li><a class="buttons" href="sponsors.php">Галерея</font></a></li>
            </ul>
        </div>

        <div class="container">
            

            

            <div class="block1">
            </div>
             
            <div class="block2">
            


            <?php
            // include the database conn file
            include 'db.php';

            $sql = "SELECT id, name FROM employees"; // Предполагая, что столбец с именем сотрудника называется 'name'
            $result2 = mysqli_query($conn,$sql);

            $sql3 = "SELECT id, company_name FROM sponsors"; // Предполагая, что столбец с названием компаний называется 'company_name'
            $result3 = mysqli_query($conn,$sql3);

            if(isset($_POST['add_project'])) {

                $name = $_POST['name'];
                $genre = $_POST['genre'];
                $age_limit = $_POST['age_limit'];
                $dir = $_POST['dir'];
                $sponsor = $_POST['sponsor'];

                // check if the input is valid
                if(empty($name) || empty($genre)|| empty($age_limit) || empty($dir) ||empty($sponsor)) {
                    echo '<p>Пожалуйста, заполните все поля.</p>';
                } else {
                    // prepare the query to insert data into the table
                    $query = "INSERT INTO projects (name, genre, age_limit, emp_id, sponsor_id) VALUES ('$name', '$genre', '$age_limit', '$dir', '$sponsor')";

                    // execute the query
                    $result = mysqli_query($conn, $query);

                    // check if the query was successful
                    if($result) {
                        echo '<p>Данные успешно добавлены в таблицу "Проекты".</p>';
                    } else {
                        echo '<p>Ошибка при добавлении данных в таблицу "Проекты": ' . mysqli_error($conn) . '</p>';
                    }
                }
            }


            // check if delete user button is clicked
            if(isset($_POST['delete_project'])) {
                $project_id = $_POST['project_id'];
                $delete_query = "DELETE FROM projects WHERE id = $project_id";
                $delete_result = mysqli_query($conn, $delete_query);
                if($delete_result) {
                    echo '<p>Проект успешно удален.</p>';
                } else {
                    echo '<p>Ошибка при удалении проекта: ' . mysqli_error($conn) . '</p>';
                }
            }
            
            // set the default query
            $query = "SELECT p.*, s.company_head, s.budget FROM projects p INNER JOIN sponsors s ON p.sponsor_id = s.id";

            // execute the query
            $result = mysqli_query($conn, $query);

            // check if the query was successful
            if (!$result) {
                die('Error: ' . mysqli_error($conn));
            }

            // display the results in a table format
            echo '<table>';
            echo '<tr><th>Название</th><th>Жанр</th><th>Возрастное ограничение</th><th>Директор</th><th>Спонсор</th><th>Глава спонсорской компании</th><th>Бюджет</th></tr>';
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['genre'] . '</td>';
                echo '<td>' . $row['age_limit'] . '</td>';

                $sql4 = intval($row['emp_id']);
                $nq = "SELECT name FROM employees WHERE id = $sql4";
                $itog = mysqli_query($conn, $nq);
                $row2 = mysqli_fetch_assoc($itog);
                echo '<td>' .htmlspecialchars($row2['name']). '</td>';

                $sql5 = intval($row['sponsor_id']);
                $nq2 = "SELECT company_name FROM sponsors WHERE id = $sql5";
                $itog2 = mysqli_query($conn, $nq2);
                $row3 = mysqli_fetch_assoc($itog2);

                echo '<td>' .htmlspecialchars($row3['company_name']). '</td>';

                echo '<td>' . $row['company_head'] . '</td>';
                echo '<td>' . $row['budget'] . ' рубей</td>';

                echo '</tr>';
            }
            echo '</table>';

            

            // close the database connection
            mysqli_close($conn);
            ?>

            </div>

            
            <div class="block1">
            </div>
            
        </div>

    </div>


    

</body>
</html>
