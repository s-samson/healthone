<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>

<body>

<div class="container">
    <?php
    include_once('defaults/header.php');
    include_once ('defaults/menu.php');
    include_once('defaults/pictures.php');
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/contact">Contact</a></li>
        </ol>
    </nav>
    <h3>Contact</h3>

<div class = "container-cards">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Openingstijden</h5>
            <p class="card-text">  <?php
                // Dit is van de fietsenmaker opdracht hoofdstuk 9
                try {
                    $db = new PDO("mysql:host=localhost;dbname=healthone","root", "");
                    $query = $db->prepare ("SELECT * FROM opening_hours");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    echo "<table>";
                    foreach ($result as &$data) {
                        echo "<td class='tdt'>" . $data ["day"] . " ";
                        echo "<td class='tdt'>" . $data ["time"] . "<br>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } catch(PDOException $e) {
                    die("Error!: " . $e->getMessage());
                }
                ?></p>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Contact</h5>
            <p class="card-text">
                <b>Locatie:</b> Zuidhoornse weg 6a <br>
                    <b>Postcode:</b> 2635 DJ Den Hoorn <br>
                        <b>Telefoon:</b> (015) 2578924 <br>
                        <b>Email:</b> Healthone@gmail.com <br>

            </p>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Locatie</h5>
            <p class="card-text"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1329.858406702439!2d4.33134515325898!3d51.99512845798715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5b44d61a108cf%3A0x9da6361d0a36ebd1!2sZuidhoornseweg%206A%2C%202625%20DV%20Den%20Hoorn!5e0!3m2!1snl!2snl!4v1634204330404!5m2!1snl!2snl" width="260" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
        </div>
    </div>
</div>

    <?php
    include_once('defaults/footer.php');

    ?>
</div>


</body>
</html>

