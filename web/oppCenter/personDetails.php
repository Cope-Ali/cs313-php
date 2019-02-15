<?php
//start session to store credentials
session_start();
include("accessDB.php");

$id = htmlspecialchars($_GET['id']);

$stmt1 = $db->prepare('SELECT
person_ward,         
person_first,       
person_last,
person_street_address, 
person_city,
person_state,
person_phone,
person_email,
leader_calling,
progress_id
FROM person 
Left JOIN leader on person.person_id = leader.leader_person 
Left Join progress on person.person_id = progress.progress_person
WHERE person_id =:id');
$stmt1->bindValue(':id', $id, PDO::PARAM_INT);
$stmt1->execute();
$person_rows = $stmt1->fetchAll(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html>
<head>
    <?php include("header.php");?>
    
    <link rel="stylesheet" href="oppStyle.css">
</head>
<body>

<?php include("nav.php");?>

<div class="container" >

<?php
    foreach ($person_rows as $pr)
    {
        $first = $pr['person_first'];
        $last = $pr['person_last'];
        $ward = $pr['person_ward'];
        $street = $pr['person_street_address'];
        $city_state = $pr['person_city'] . ', ' . $pr['person_state'];
        $phone = $pr['person_phone'];
        $email = $pr['person_email'];
        $calling = $pr['leader_calling'];
        $prog_id = $pr['progress_id'];

        echo "<strong>" . $first . " " . $last . "</strong>" . "<br>Ward: " .  $ward;
        echo "<br><strong> Contact Information: </strong> <br>" . $street . '<br>';
        echo $city_state'<br>';
        echo "Phone: " . $phone . '<br>';
        echo "Email: " . $email;
        echo '<br/>';
        echo "Calling: " . $calling . "<br> <hr>";
    }



    $stmt2 = $db->prepare('SELECT
    opportunity_name,
    progress_status,
    notes_id
    FROM progress
    Left Join opportunity on progress.progress_opportunity = opportunity.opportunity_id
    Left Join notes on progress.progress_id = notes.notes_progress
    WHERE progress_id =:id');
    $stmt2->bindValue(':id', $prog_id, PDO::PARAM_INT);
    $stmt2->execute();
    $Op_rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    



    foreach ($Op_rows as $or)
    {
        $op_name = $or['opportunity_name'];
        $status = $or['progress_status'];
        $notes_id = $or['notes_id'];

        echo "Current Opportunities: " . $row['opportunity_name'] . "<br> Status: " . $row['progress_status'] . $row['progress_id'] . '<br>';
    
    }

    $stmt3 = $db->prepare('SELECT 
    notes_date,
    notes_text,
    leader_calling,
    person_first,
    person_last
    from notes 
    Left Join leader on notes.notes_leader = leader.leader_id
    Left Join person on leader.leader_person = person.person_id
    WHERE notes_id =:id');
    $stmt3->bindValue(':id', $notes_id, PDO::PARAM_INT);
    $stmt3->execute();
    $notes_rows = $stmt3->fetchAll(PDO::FETCH_ASSOC);

    foreach ($notes_rows as $nr)
    {
        $notes_by = $nr['person_first'] . " " . $nr['person_last'] . " - " . $nr['leader_calling'];
        $date = $nr['notes_date'];
        $content = $nr['notes_text'];

        echo "Note By: " . $notes_by . "<br>";
        echo "Date: " . $date . '<br>';
        echo "Note Text: <br>" . $content . "<br><hr>";
    }

?>

</div>

<?php include("footer.php");?>

</body>
</html>