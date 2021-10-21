<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
// aantekeningen voor mezelf
// STH = Statement Handle
// PDO = PHP Data Object
// FETCH_ASSOC = Zet data uit een database in een array
// Fetch = haalt de volgende rij op uit een resultaten set
// BindParam = bind een parameter naar een speciefieke variabele naam.
// query = met een query geef je een opdracht aan de database om een bepaalde actie uit te voeren. geeft eventueel ook data terug.
// Fetchall = Wordt een array gereturned met alle rows van een resultaat
// prepare = Maakt een statement klaar voor executie en return een object.
// PDO::PARAM_INT = geef je aan dat het een Integer is



function getCategories()
{
    global $pdo;
    $categories =$pdo->query('Select * FROM category')->fetchAll( PDO::FETCH_CLASS,'Category');
    return $categories;

}

function getCategoryName(int $id)
{
    global $pdo;
    $sth = $pdo->prepare('Select name FROM category WHERE id=?');
    $sth-> bindParam(1,$id,PDO::PARAM_INT);
    $sth->execute();
    $category=$sth->fetch(PDO::FETCH_ASSOC);
    return $category['name'];

}