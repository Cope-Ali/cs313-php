<?php
session_start();
include("accessDB.php");

// Sanatize input from form
$ward = htmlspecialchars($_POST['ward']);
$first = htmlspecialchars($_POST['first_name']);
$last = htmlspecialchars($_POST['last_name']);
$address = htmlspecialchars($_POST['street_address']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);
$calling = htmlspecialchars($_POST['calling']);
// $opp = htmlspecialchars($_POST['opportunity']);

//insert new person into person table
$stmt = $db->prepare('INSERT INTO person(
    person_ward,
    person_first,
    person_last,
    person_street_address,
    person_city,
    person_state,
    person_phone,
    person_email
    ) VALUES (:person_ward, :person_first, :person_last, :person_street_address, :person_city, :person_state, :person_phone, :person_email);');
$stmt->bindValue(':person_ward', $ward, PDO::PARAM_STR);
$stmt->bindValue(':person_first', $first, PDO::PARAM_STR);
$stmt->bindValue(':person_last', $last, PDO::PARAM_STR);
$stmt->bindValue(':person_street_address', $address, PDO::PARAM_STR);
$stmt->bindValue(':person_city', $city, PDO::PARAM_STR);
$stmt->bindValue(':person_state', $state, PDO::PARAM_STR);
$stmt->bindValue(':person_phone', $phone, PDO::PARAM_STR);
$stmt->bindValue(':person_email', $email, PDO::PARAM_STR);
$stmt->execute();

//get person id for last created person
$newId = $db->lastInsertId('person_person_id_seq');

//insert into leadership table if leader option was chosen
if ($leader != "")
{
    $stmt2 = $db->prepare('INSERT Into Leader (
        leader_person,
        leader_ward,            
        leader_calling        
    )
    VALUES (
        :leader_person,
        :leader_ward,            
        :leader_calling);');
    $stmt2->bindValue(':leader_person', $newId, PDO::PARAM_INT);
    $stmt2->bindValue(':leader_ward', $ward, PDO::PARAM_STR);
    $stmt2->bindValue(':leader_calling', $calling, PDO::PARAM_STR);
    $stmt2->execute();
}

if ($opp > 0)
{
    $stmt3 = $db->prepare('INSERT Into progress (
        progress_person,
        progress_opportunity,
        progress_status
    )
    VALUES (
        :progress_person,
        :progress_opportunity,            
        :progress_status);');
    $stmt3->bindValue(':progress_person', $newId, PDO::PARAM_INT);
    $stmt3->bindValue(':progress_opportunity', $opp, PDO::PARAM_INT);
    $stmt3->bindValue(':progress_status', 'In Progress', PDO::PARAM_STR);
    $stmt3->execute();
} 

$new_page ="personDetails.php?id=$newId";
header("Location: $new_page");
die();
?>