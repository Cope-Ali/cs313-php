<?php
session_start();
include("accessDB.php");

$ward = htmlspecialchars($_POST['ward']);
$first = htmlspecialchars($_POST['first_name']);
$last = htmlspecialchars($_POST['last_name']);
$address = htmlspecialchars($_POST['street_address']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);
$calling = htmlspecialchars($_POST['calling']);


$stmt = $db->prepare('INSERT INTO notes(
    notes_progress,
    notes_person,
    notes_leader,
    notes_text             
) VALUES (:progress_id, :person_id, :leader_id, :content);');
$stmt->bindValue(':progress_id', $progress_id, PDO::PARAM_INT);
$stmt->bindValue(':person_id', $person_id, PDO::PARAM_INT);
$stmt->bindValue(':leader_id', $leader_id, PDO::PARAM_INT);
$stmt->bindValue(':content', $text, PDO::PARAM_STR);
$stmt->execute();

$new_page ="personDetails.php?id=$person_id";
header("Location: $new_page");
die();
?>