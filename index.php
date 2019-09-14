<?php
include_once 'db_function/insurance.php';
include_once 'db_function/patient_func.php';
?>

<!DOCTYPE html>

<html>
<head>
    <title>Pemrograman Web 2</title>
    <meta name="author" content="Kelvin (1772039)">
    <meta name="description" content="PHP Navigation and PHP Data Object (PDO)">
    <link rel="stylesheet" type="text/css" href="tableStyle.css">
</head>

<body>
<div class="page">
    <header>
        <h2 align="center">Pemrograman Web Praktium 2</h2>
    </header>

    <nav>
        <ul>
            <li><a href="?menu=hm">Home</a></li>
            <li><a href="?menu=pt">Patient</a></li>
            <li><a href="?menu=ins">Insurance</a></li>
        </ul>
    </nav>

    <main>
        <?php
        $targetMenu = filter_input(INPUT_GET, 'menu');
        switch ($targetMenu) {
            case 'hm':
                include_once 'view/home.php';
                break;
            case 'pt':
                include_once 'view/patient.php';
                break;
            case 'ins':
                include_once 'view/insurance.php';
                break;
            default:
                include_once 'view/home.php';
        }
        ?>
    </main>

    <footer>
        Pemrograman Web 2 &copy;2019
    </footer>
</div>
</body>
</html>
