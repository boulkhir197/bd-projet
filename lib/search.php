<?php

require_once('util.php');
extract($_POST);
extract($_GET);

try{
    $tab = filmSearch($motcle);

    $res = array(
        "status" => "ok",
        "args" => array("titre","date_sortie","duree","serie"),
        "result" => $tab
    );
} catch(Exception $e){
    $res = array(
        "status" => "error",
        "args" => array("titre","date_sortie","duree","serie"),
        "message" => null
    );
}
header('Content-Type: application/json');
echo json_encode($res);


?>
