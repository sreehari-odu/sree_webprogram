<?php
require_once 'helpers.php';
if($_REQUEST['type']=="addfav"){
    $userID = $_SESSION['uname'];
    $documentID = $_REQUEST['id'];
    echo json_response(addfav($documentID,$userID),json_encode('added'));
}
if($_REQUEST['type']=="remfav"){
    $userID = $_SESSION['uname'];
    $documentID = $_REQUEST['id'];
    echo json_response(remfav($documentID,$userID),json_encode('removed'));
}
if($_REQUEST['type']=="delclaim"){
    $userID = $_SESSION['uname'];
    $claimId = $_REQUEST['id'];
    echo json_response(delclaim($claimId,$userID),json_encode('deleted'));
}
if($_REQUEST['type']=="upclaim"){
    $userID = $_SESSION['uname'];
    $claimId = $_REQUEST['id'];
    echo json_response(claimup($claimId),json_encode('Voted up'));
}
if($_REQUEST['type']=="downclaim"){
    $userID = $_SESSION['uname'];
    $claimId = $_REQUEST['id'];
    echo json_response(claimdown($claimId),json_encode('Voted Down'));
}
if($_REQUEST['type']=="removevote"){
    $userID = $_SESSION['uname'];
    $claimId = $_REQUEST['id'];
    echo json_response(removeclaim($claimId),json_encode('Removed Vote'));
}
if($_REQUEST['type']=="getvotecount"){
    $userID = $_SESSION['uname'];
    $claimId = $_REQUEST['id'];
    echo json_response(200,claimvotes($claimId));
}