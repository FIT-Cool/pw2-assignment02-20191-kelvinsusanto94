<?php
function getAllPatient()
{
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT p.med_record_number, i.name_class, p.citizen_id_number, p.name, p.address, p.birth_place, p.birth_date, p.phone_number, p.photo
                FROM patient p 
                JOIN insurance i
                ON p.insurance_id = i.id
                ORDER BY med_record_number";
    $result = $link->query($query);
    $link = null;
    return $result;
}

function addPatient($MRN, $CIN, $Name, $Address, $BirthPlace, $BirthDate, $PhoneNumber, $Photo, $InsuranceId){
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "INSERT INTO patient(med_record_number, citizen_id_number, name, address, birth_place, birth_date, phone_number, photo, insurance_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $link->prepare($query);
    $statement = $link->prepare($query);
    $statement->bindParam(1,$MRN, PDO::PARAM_STR);
    $statement->bindParam(2,$CIN, PDO::PARAM_STR);
    $statement->bindParam(3,$Name, PDO::PARAM_STR);
    $statement->bindParam(4,$Address, PDO::PARAM_STR);
    $statement->bindParam(5,$BirthPlace, PDO::PARAM_STR);
    $statement->bindParam(6,$BirthDate, PDO::PARAM_STR);
    $statement->bindParam(7,$PhoneNumber, PDO::PARAM_STR);
    $statement->bindParam(8,$Photo, PDO::PARAM_STR);
    $statement->bindParam(9,$InsuranceId, PDO::PARAM_STR);
    $link->beginTransaction();
    if ($statement->execute()){
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}
?>
