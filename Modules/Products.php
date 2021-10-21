<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
// aantekeningen voor mezelf
// STH = Statement Handle
// PDO = PHP Data Object
// FETCH_ASSOC = Zet data uit een database in een array
// Fetch = haalt de volgende rij op uit een resultaten set
// BindParam = bind een parameter naar een speciefieke variabele naam.
// prepare = Maakt een statement klaar voor executie en return een object.
// query = met een query geef je een opdracht aan de database om een bepaalde actie uit te voeren. geeft eventueel ook data terug.
// Fetchall = Wordt een array gereturned met alle rows van een resultaat



function getProducts(int $categoryId)
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product WHERE category_id=? ');
    $sth->bindParam(1, $categoryId);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
}

function getProduct(int $productId)
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product WHERE id=?');
    $sth->bindParam(1, $productId);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product')[0];
}

