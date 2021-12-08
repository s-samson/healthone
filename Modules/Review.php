<?php
function getReview()
{
    GLOBAL $pdo;
    $sth=$pdo->prepare('SELECT * FROM review order by date DESC');

    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Review');
}

function saveReview(string $name, string $description, $id):void
{
    GLOBAL $pdo;

    $sth = $pdo->prepare('INSERT INTO review (name , description, product_id, user_id) VALUES (:n,:d,:p,1)');
    $sth->bindParam("n", $name);
    $sth->bindParam("d", $description);
    $sth->bindParam("p",$id);
    $sth->execute();
}

