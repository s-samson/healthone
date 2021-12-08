<?php
<<<<<<< HEAD
function getReview(int $id):array
{
    GLOBAL $pdo;

    $sth=$pdo->prepare('SELECT * FROM review where product_id=? order by date DESC');
    $sth->bindParam(1,$id);
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 03a3cb30438bb15e0cfd1ff42cb8b1b78b055898
function getReview()
{
    GLOBAL $pdo;
    $sth=$pdo->prepare('SELECT * FROM review order by date DESC');

>>>>>>> 46f8e6ce64d50b724af07c56f93e77abc68affe9
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Review');
}

<<<<<<< HEAD
function saveReview(string $name, string $description, string $stars, $id):void
{
    GLOBAL $pdo;

    $sth = $pdo->prepare('INSERT INTO review (name, description, stars, product_id, user_id) VALUES (:n,:d,:s,:p,1)');
    $sth->bindParam("n", $name);
    $sth->bindParam("d", $description);
    $sth->bindParam("s", $stars);
=======
function saveReview(string $name, string $description, $id):void
{
    GLOBAL $pdo;

    $sth = $pdo->prepare('INSERT INTO review (name , description, product_id, user_id) VALUES (:n,:d,:p,1)');
    $sth->bindParam("n", $name);
    $sth->bindParam("d", $description);
>>>>>>> 46f8e6ce64d50b724af07c56f93e77abc68affe9
    $sth->bindParam("p",$id);
    $sth->execute();
}

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
function getBerichten():array
{
    GLOBAL $pdo;
    $sth=$pdo->prepare('SELECT * FROM review order by date DESC');
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'review');
}

function saveBericht(string $name, string $description):void
{
    GLOBAL $pdo;

    $sth = $pdo->prepare('INSERT INTO review (name , description, date) VALUES (?,?,current_timestamp())');
    $sth->bindParam(1, $name);
    $sth->bindParam(2, $description);
    $sth->execute();
}
>>>>>>> 597c3bccbaefdee2ec828665cf59de943077ff49
>>>>>>> 03a3cb30438bb15e0cfd1ff42cb8b1b78b055898
>>>>>>> 46f8e6ce64d50b724af07c56f93e77abc68affe9
