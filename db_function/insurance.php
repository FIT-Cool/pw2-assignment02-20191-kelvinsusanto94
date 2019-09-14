<?php

function getAllInsurance()
{
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM insurance ORDER BY id";
    $result = $link->query($query);
    $link = null;
    return $result;
}

function addInsurance($name)
{
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "INSERT INTO insurance(name_class) VALUES (?)";
    $link->prepare($query);
    $statement = $link->prepare($query);
    $statement->bindParam(1, $name, PDO::PARAM_STR);
    $link->beginTransaction();
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}
