<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Спонсоры</title>
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
        buttons{
        	font-family: century gothic;
        	font-weight: bold;
        }
        
        body {
            font-family: Arial, sans-serif;

            margin: 0;
            padding: 20px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Три колонки */
            gap: 15px; /* Отступы между изображениями */
            max-width: 900px; /* Максимальная ширина галереи */
            margin: 0 auto; /* Центрирование галереи */
        }

        .gallery img {
            width: 100%; /* Изображения занимают всю ширину ячейки */
            height: 200px; /* Установите нужную высоту */
            object-fit: cover; /* Сохранение пропорций изображений */
            border-radius: 8px; /* Скругление углов */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Тень для глубины */
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
		    	<li><a class="mainbuttons" href="sponsors.php">Галерея</font></a></li>
	        </ul>
	    </div>

		<div class="container">
			
			
			<div class="gallery">
        <img src="img1.jpg" alt="Изображение 1">
        <img src="img5.jpg" alt="Изображение 2">
        <img src="img9.jpg" alt="Изображение 3">
        <img src="img8.jpg" alt="Изображение 4">
        <img src="img2.jpg" alt="Изображение 5">
        <img src="img4.jpg" alt="Изображение 6">
        <img src="img3.jpg" alt="Изображение 7">
        <img src="img7.jpg" alt="Изображение 8">
        <img src="img6.jpg" alt="Изображение 9">
    </div>

		</div>
	</div>

</body>
</html>
