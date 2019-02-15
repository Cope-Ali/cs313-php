
<?php
//start session to store credentials
session_start();
include('accessDB.php');

$query = 'select ward From wards';
$stmt = $db->prepare($query);
$stmt->execute();
$wards = $stmt->fetchAll(PDO::FETCH_ASSOC);

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


<form action="" method="post">
<h2>Search By:</h2>
Ward: <select name='ward'>
<option value='default'> Select Ward </option>
<?php
foreach ($wards as $ward)
{
    $ward_name = $ward['ward'];
echo "<option value='$ward_name'> $ward_name </option>" ;
}
?></select><br>
Last Name: <input type="text" name = "last_name"> <br>
<input type="submit" name="submit" value="Submit">
</form>


<?php
if($_POST['ward'] != "")
{
    foreach ($db->query('SELECT * FROM person WHERE person_ward =\'' . $_POST['ward'] . '\'') as $row)
    {
    echo "<strong>" . $row['person_first'] . " " . $row['person_last'] . "</strong>  Ward: " . $row['person_ward'];
    echo "<a href='personDetails.php?id=". $row['person_id'] . "'> 'Person Details' </a>";
    echo '<br/>';
    }
}

if($_POST['last_name'] != "" )
{
    foreach ($db->query('SELECT * FROM person WHERE person_last =\'' . $_POST['last_name'] . '\'') as $row)
    {
    echo "<strong>" . $row['person_first'] . " " . $row['person_last'] . "</strong>" . " - Ward: " . $row['person_ward'];
    echo "<a href='personDetails.php?id=". $row['person_id'] . "'> Details </a>";
    echo '<br/>';
    }
}

?>

</div>

<?php include("footer.php");?>

</body>
</html>