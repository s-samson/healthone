<!DOCTYPE html>
<html>

<?php
include_once('defaults/head.php');
?>

<body>

<div class="container">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
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

<div class="row">
    <div class="col-md-12">
        <div class="card-body text-center">
            <h5 id="Product-card-text" class="card-title"><?= $product->name ?></h5>
            <img class="img-fluid center-block" width="300px" src='/img/<?= $product->picture ?>'/>
            <div class="card-body">
                <h5 id="Product-card-text" class="card-text"><?= $product->description ?></h5>
                <a type="button" href="/review/<?=$product->id?>" role="button" class="btn btn-secondary">Add Review</a>
            </div>
        </div>
    </div>
</div>

<?php
global $product;
try {
    $db = new PDO("mysql:host=localhost;dbname=healthone","root", "");
    $query = $db->prepare('SELECT * FROM review where product_id =' . $product->id);
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

<hr>
<?php
include_once('defaults/footer.php');

?>

</body>
</html>
</html>