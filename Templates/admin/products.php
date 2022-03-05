<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>
<head>
    <style>
    body {
    font-size: 1.25rem;
    background-color: #f6f8fa;
    }

    table {
    wdith: 100px;
    border-collapse: collapse;
    border: 1px solid black;
    background-color: lightgray;
    }
    td {
    border: 1px solid black;
    width: 100px;
    }
    </style>
</head>
<body>

<div class="container">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
    global $products;
    global $product;
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Sportcenter</a></li>
            <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
            <li class="breadcrumb-item"><a href="/products">Products</a></li>
        </ol>
    </nav>

</div>



<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Afbeelding</th>
                <th scope="col">Naam</th>
                <th scope="col">Category</th>
                <th scope="col">Aanpassen</th>
                <th scope="col">Verwijderen</th>
                <th scope="col">Toevoegen</th>
            </tr>
            </thead>
            <tbody id="mytable">
            <?php
            $number = 1;
            foreach ($products as $product) {
                ?>
                <tr>
                    <td><?=$number?></td>
                    <td scrope="col"><img class="img-fluid center-block" width="100px" src='/img/<?= $product->picture ?>'/></td>
                    <td scrope="col"><?=$product->name?></td>
                    <td scrope="col"><?=getCategoryName($product->category_id)?></td>
                    <td scrope="col"><a class="btn btn-warning btn-sm px-3" href="/admin/edit/<?=$product->id?>">Aanpassen</a></td>
                    <td scrope="col"><a class="btn btn-danger btn-sm px-3" href="/admin/deleteProduct/<?=$product->id?>">Delete</a></td>
                    <td scrope="col"><a class="btn btn-success btn-sm px-3" href="/admin/addProducts">Toevoegen</a></td>
                </tr>
                <?php
                $number++;
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
    <?php
    include_once('defaults/footer.php');

    ?>

</body>
</html>
</html>