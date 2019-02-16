<?php
//start session to store credentials
session_start();
include("accessDB.php");

$query1 = 'select ward From wards';
$stmt1 = $db->prepare($query1);
$stmt1->execute();
$wards = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$query2 = 'select calling From callings';
$stmt2 = $db->prepare($query2);
$stmt2->execute();
$callings = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$query3 = 'select opportunity_id, opportunity_name From opportunity';
$stmt3 = $db->prepare($query3);
$stmt3->execute();
$opportunities = $stmt3->fetchAll(PDO::FETCH_ASSOC);

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
<h2> Add New Person </h2>

<form action="insert_person.php" method="post">
Ward: <select name='ward'>
<option value='default'> Select Ward </option>
<?php
foreach ($wards as $ward)
{
    $ward_name = $ward['ward'];
echo "<option value='$ward_name'> $ward_name </option>" ;
}
?></select><br>
First Name: <input type="text" name = "first_name"> <br>
Last Name: <input type="text" name = "last_name"> <br>
Street Address: <input type="text" name = "street_address"> <br>
City: <input type="text" name = "city"> <br>
State Abbreviation <input type="text" name = "state"> <br>
Phone: <input type="text" name = "phone"> <br>
Email: <input type="text" name = "email"> <br>
Leadership Calling:  <select name='calling'>
<option value='default'> None </option>
<?php
foreach ($callings as $calling)
{
    $calling_name = $calling['calling'];
echo "<option value='$calling_name'> $calling_name </option>" ;
}
?></select><br>
Opportunities: <select name='opportunity'>
<option value='0'> None </option>
<?php
foreach ($opportunities as $op)
{
    $op_name = $op['opportunity_name'];
    $op_id = $op['opportunity_id'];

    echo "<option value='$op_id'> $op_name </option>" ;
}
?></select><br>

<input type="submit" name="submit" value="Submit">
</form>

</div>

<?php include("footer.php");?>

</body>
</html>