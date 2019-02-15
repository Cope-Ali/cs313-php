<?php
session_start();
include("accessDB.php");

$ward = htmlspecialchars($_POST['person_id']);
$first = htmlspecialchars($_POST['progress_id']);
$last = htmlspecialchars($_POST['leader_id']);
$address = htmlspecialchars($_POST['note_text']);
$city = htmlspecialchars($_POST['person_id']);
$state = htmlspecialchars($_POST['progress_id']);
$phone = htmlspecialchars($_POST['leader_id']);
$email = htmlspecialchars($_POST['note_text']);


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