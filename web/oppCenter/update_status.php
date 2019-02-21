<?php
session_start();
include("accessDB.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$person_id = htmlspecialchars($_POST['person_id']);
$progress_id = htmlspecialchars($_POST['progress_id']);
$status =  htmlspecialchars($_POST['status']);

echo $person_id . " " . $progress_id . " " . $status;

$stmt = $db->prepare('Update progress
    SET progress_status = :status
    WHERE progress_id = :progress:id;');
$stmt->bindValue(':progress_id', $progress_id, PDO::PARAM_INT);
$stmt->bindValue(':status', $status, PDO::PARAM_STR);
$stmt->execute();

// $new_page ="personDetails.php?id=$person_id";
// header("Location: $new_page");
// die();
?>