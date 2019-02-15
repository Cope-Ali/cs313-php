<?php

$person_id = $_POST['person_id'];
$progress_id = $_POST['progress_id'];
$leader_id = $_POST['leader_id'];


/* Insert Into notes (
    notes_progress,
    notes_person,
    notes_leader,
    notes_text             
)
VALUES
('4','1','3','more notes go here'); */

echo $person_id . " " . $progress_id . " " . $leader_id;
?>