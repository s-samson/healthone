<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<?php

    require '../Modules/Database.php';
    require '../Modules/Review.php';

    if(isset($_POST['verzenden'])) {
        saveBericht($_POST['naam'],$_POST['bericht']);
    }
?>

>>>>>>> 597c3bccbaefdee2ec828665cf59de943077ff49
>>>>>>> 03a3cb30438bb15e0cfd1ff42cb8b1b78b055898
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Formulier</title>

<head>

<body>
<div class="container">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
<<<<<<< HEAD
    include_once('defaults/head.php');
=======
<<<<<<< HEAD
    include_once('defaults/head.php');
=======
>>>>>>> 597c3bccbaefdee2ec828665cf59de943077ff49
>>>>>>> 03a3cb30438bb15e0cfd1ff42cb8b1b78b055898
    global $product;
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Sportcenter</a></li>
            <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
            <li class="breadcrumb-item"><a href="/products">Products</a></li>
            <li class="breadcrumb-item"><a href="/product">Product</a></li>
        </ol>
    </nav>

</div>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 03a3cb30438bb15e0cfd1ff42cb8b1b78b055898
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card-body text-center">
            <?php echo $product->name;?>
<<<<<<< HEAD
=======
=======

<div class="row">
    <div class="col-md-12">
        <div class="card-body text-center">
>>>>>>> 597c3bccbaefdee2ec828665cf59de943077ff49
>>>>>>> 03a3cb30438bb15e0cfd1ff42cb8b1b78b055898
            <h5 id="Product-card-text" class="card-title"><?= $product->name ?></h5>
            <img class="img-fluid center-block" width="300px" src='/img/<?= $product->picture ?>'/>
            <div class="card-body">
                <h5 id="Product-card-text" class="card-text"><?= $product->description ?></h5>
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
                <div class="container">
>>>>>>> 597c3bccbaefdee2ec828665cf59de943077ff49
>>>>>>> 03a3cb30438bb15e0cfd1ff42cb8b1b78b055898
                    <div class="row gy-3">
                        <form method="post">
                            <div class="mb-3">
                                <label for="naam" class="col-form-label">
                                    Naam:
                                </label>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 03a3cb30438bb15e0cfd1ff42cb8b1b78b055898
                                <input type="text" name="name" class="form-control" id="naam">
                            </div>
                            <div class="mb-3">
                                <label for="bericht" class="col-form-label">
                                    review:
                                </label>
                                <input type="text" name="description" class="form-control" id="review">
<<<<<<< HEAD
=======
=======
                                <input type="text" name="naam" class="form-control" id="naam">
                            </div>
                            <div class="mb-3">
                                <label for="bericht" class="col-form-label">
                                    Bericht:
                                </label>
                                <input type="text" name="bericht" class="form-control" id="bericht">
>>>>>>> 597c3bccbaefdee2ec828665cf59de943077ff49
>>>>>>> 03a3cb30438bb15e0cfd1ff42cb8b1b78b055898
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="verzenden" class="btn btn-secondary">Save Change</button>
                            </div>
                        </form>
                    </div>

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
                    <?php
                    global $product;
                    echo $product->name;
                    try {
                        $db = new PDO("mysql:host=localhost;dbname=healthone","root", "");
                        $query = $db->prepare ("SELECT * FROM review");
                        $query->execute();
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as &$data) {
                            echo $data ["name"] . " <br>  ";
                            echo $data ["description"] . " <br> ";
                            echo $data ["date"] . " <br> <br> ";
                        }
                        echo "</table>";
                    } catch(PDOException $e) {
                        die("Error!: " . $e->getMessage());
                    }
                    ?>
>>>>>>> 597c3bccbaefdee2ec828665cf59de943077ff49
>>>>>>> 03a3cb30438bb15e0cfd1ff42cb8b1b78b055898
            </div>
        </div>
    </div>
</div>




</body>

</html>