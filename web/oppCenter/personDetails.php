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
    foreach ($db->query('SELECT * FROM person WHERE person_id =\'' . $_GET['id'] . '\'') as $row)
    {
    echo "<strong>" . $row['person_first'] . " " . $row['person_last'] . "</strong>" . "<br> - Ward: " . $row['person_ward'];
    echo "<strong> Contact Information: </strong> <br>" . $row['person_street_address'] . '<br>';
    echo $row['person_city'] . ", " . $row['person_state'] . '<br>';
    echo "Phone: " . $row['person_phone'] . '<br>';
    echo "Email: " . $row['person_email'];
    echo '<br/>';
    }

    foreach ($db->query('SELECT * FROM leader WHERE leader_person =\'' . $_GET['id'] . '\'') as $row)
    {
    echo "Calling: " . $row['leader_calling'] . "<br> ";
    }

    foreach ($db->query('SELECT * FROM progress WHERE progress_person =\'' . $_GET['id'] . '\'') as $row)
    {
    echo "Current Opportunities: " . $row['progress_opportunity'] . " Status: " . $row['progress_status'] . '<br>';
        foreach ($db->query('SELECT * FROM notes WHERE notes_progress =\'' . $row['progress_id'] . '\'') as $row)
        {
        echo "Note By: " . $row['notes_leader'] . " Date: " . $row['notes_date'] . '<br>';
        echo "Note Text: " . $row['notes_text'];
        }
    echo '<br/>';
    }

}

?>

</div>

<?php include("footer.php");?>

</body>
</html>