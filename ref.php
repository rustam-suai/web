<!DOCTYPE html>
<html>
<head>
    <title>О нас</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    <style>


        <!--

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
        h1,h2{
            font-family: century gothic;
            text-align: center;
            align:center;
        }
        a{
            font-family: century gothic;
        }

        !-->

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .contact-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 90%;
            max-width: 500px; /* Максимальная ширина для удобства */
            text-align: center;
            justify-content: center;
            position: absolute;
            top: 50%; /* Смещение по вертикали */
            left: 50%; /* Смещение по горизонтали */
            transform: translate(-50%, -50%); /* Убираем половину ширины и высоты */
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
            justify-content: center;

        }
        .contact-item {
            margin: 15px 0;
        }
        .contact-item a {
            color: #007bff;
            text-decoration: none;
        }
        .contact-item a:hover {
            text-decoration: underline;
        }

    </style>
</head>

<body bgcolor="D7F9F7">
    
    <div class="page" style="text-align: center;">
        <div class="block0">
            <ul class="nav">
                <li><a class="buttons" href="index.php">Главная</a></li>
                <li><a class="buttons" href="series.php">Серии</font></a></li>
                <li><a class="buttons" href="projects.php">Проекты</font></a></li>
                <li><a class="mainbuttons" href="ref.php">Контакты</font></a></li>
    	        <li><a class="buttons" href="sponsors.php">Галерея</font></a></li>
            </ul>
        </div>
<div class="block0">
        <h1 align="center">Пишите, звоните, приходите!</h1>
    </div>
        <br>
        <div class="container">
            
            <div class="contact-container">
                <div class="contact-item">
                    <h2>E-Mail</h2>
                    <p><a href="mailto:info@example.com">info@example.com</a></p>
                </div>

                <div class="contact-item">
                    <h2>Телефон</h2>
                    <p>+7 (812) 567 89 12</p>
                    <p>Пн-Чт, Вс: 8:00 - 21:00</p>
                    <p>Пт-Сб: Выходной</p>
                </div>

                <div class="contact-item">
                    <h2>Адрес</h2>
                    <p>Санкт-Петербург, ул. Гастелло, дом 15</p>
                </div>

            </div>

        </div>
    </div>

</body>
</html>
