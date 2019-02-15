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
$opps = htmlspecialchars($_POST['op_box']);

echo $opps;
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

if(!empty($_POST['op_box']))
{
    $query3 = 'select opportunity_id From opportunity';
    $stmt3 = $db->prepare($query3);
    $stmt3->execute();
    $opportunities = $stmt3->fetchAll(PDO::FETCH_ASSOC);

    foreach ($opportunities as $op)
    {
        $op_id = $op['opportunity_id'];
        foreach ($opps as $selected)
        {
            if($op_id == $selected)
            {
                $stmt4 = $db->prepare('INSERT Into Progress (
                    progress_person,
                    progress_opportunity,
                    progress_status
                )
                VALUES (
                    :progress_person,
                    :progress_opportunity,            
                    :progress_status);');
                $stmt4->bindValue(':progress_person', $newId, PDO::PARAM_INT);
                $stmt4->bindValue(':progress_opportunity', $op_id, PDO::PARAM_INT);
                $stmt4->bindValue(':progress_status', 'In Progress', PDO::PARAM_STR);
                $stmt4->execute();  
            }
        }

    }
}

//$new_page ="personDetails.php?id=$newId";
//header("Location: $new_page");
//die();
?>