
<?php
//start session to store credentials
session_start();
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

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
foreach ($db->query('SELECT * FROM scriptures') as $row)
{
  echo 'book: ' . $row['book'];
  echo 'chapter: ' . $row['chapter'];
  echo 'verse: ' . $row['verse'];
  echo 'content: ' . $row['content'];
  echo '<br/>';
}


?>

</div>

<?php include("footer.php");?>

</body>
</html>