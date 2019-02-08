<?php
//start session to store credentials
session_start();
include("accessDB.php");

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
if($_GET['id'] != "")
{
    foreach ($db->query('SELECT
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
    WHERE person_id =\'' . $_GET['id'] . '\'') as $row)
    {
    echo "<strong>" . $row['person_first'] . " " . $row['person_last'] . "</strong>" . "<br>Ward: " . $row['person_ward'];
    echo "<br><strong> Contact Information: </strong> <br>" . $row['person_street_address'] . '<br>';
    echo $row['person_city'] . ", " . $row['person_state'] . '<br>';
    echo "Phone: " . $row['person_phone'] . '<br>';
    echo "Email: " . $row['person_email'];
    echo '<br/>';
    echo "Calling: " . $row['leader_calling'] . "<br> <hr>";

    foreach ($db->query('SELECT
    opportunity_name,
    progress_status,
    notes_date,
    notes_text,
    leader_calling,
    person_first,
    person_last
FROM progress
    Left Join opportunity on progress.progress_opportunity = opportunity.opportunity_id
    Left Join notes on progress.progress_id = notes.notes_progress
    Left Join leader on notes.notes_leader = leader.leader_id
    Left Join person on leader.leader_person = person.person_id
    WHERE progress_id =\'' . $row['progress_id'] . '\'') as $row)
    {
    echo "Current Opportunities: " . $row['opportunity_name'] . "<br> Status: " . $row['progress_status'] . '<br>';
    echo "Note By: " . $row['person_first'] . " " . $row['person_last'] . ", " . $row['leader_calling'] . "<br> Date: " . $row['notes_date'] . '<br>';
        echo "Note Text: <br>" . $row['notes_text'] . "<br><hr>";
        }
    echo '<br/>';
    }

}

?>

</div>

<?php include("footer.php");?>

</body>
</html>