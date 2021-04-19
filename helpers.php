<?php
session_start();
require_once 'config.php';
function getCurrentUserDetails(){
    $sql = "select fname,lname,email,created_date from users where uname like '".$_SESSION['uname']."'";
    $result = mysqli_query($GLOBALS["db"], $sql);
    $resultRecord = mysqli_fetch_assoc($result);
    return $resultRecord;
}
$message = '';
function _ago($tm,$rcs = 0) {
    $cur_tm = time(); $dif = $cur_tm-strtotime($tm);
    $pds = array('second','minute','hour','day','week','month','year','decade');
    $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
    for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);

    $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
    if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
    return $x . ' ago';
}

function highlight($text, $words) {
    $highlighted = preg_filter('/' . preg_quote($words, '/') . '/i', '<mark>$0</mark>', $text);
    if (!empty($highlighted)) {
        $text = $highlighted;
    }
    return $text;
}
function printArrayValue($input){
    $returnString = '';
    if(is_array($input)){
        $count = 0;
        foreach($input as $key){
            if($count >0)
                $returnString.=", ";
            $returnString.= $key;
            $count++;
        }
    }else{
        return $input;
    }
    return $returnString;
}
function getclaims($document){
    $sql = "select claim_id,user_id,claim,can_reproduce,source_code,datasets,experiments_and_results,claim_date,fname,lname from claims,users where claims.user_id = users.uname and document_id = $document";
    $result = mysqli_query($GLOBALS["db"], $sql);
    $return_arr = array();
    //$resultRecord = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($return_arr,$row);
        }
        return $return_arr;
    }

    else
        return null;
}

function claimup($claim){
    $user = $_SESSION['uname'];
    removeclaim($claim);
    $query = "INSERT INTO claim_votes (claim_id,user_id,up_down) VALUES ('$claim','$user',1)";
    mysqli_query($GLOBALS["db"],$query);
    if(mysqli_error($GLOBALS["db"])){
        error_log(mysqli_error($GLOBALS["db"]));
        return 500;
    }
    else
        return 200;
}
function claimdown($claim){
    $user = $_SESSION['uname'];
    removeclaim($claim);
    $query = "INSERT INTO claim_votes (claim_id,user_id,up_down) VALUES ('$claim','$user',-1)";
    mysqli_query($GLOBALS["db"],$query);
    if(mysqli_error($GLOBALS["db"])){
        error_log(mysqli_error($GLOBALS["db"]));
        return 500;
    }
    else
        return 200;
}
function removeclaim($claim){
    $user = $_SESSION['uname'];
    $query = "delete from claim_votes where claim_id = '$claim' and user_id = '$user'";
    mysqli_query($GLOBALS["db"],$query);
    if(mysqli_error($GLOBALS["db"])){
        error_log(mysqli_error($GLOBALS["db"]));
        return 500;
    }
    else
        return 200;
}
function claimUpDown($claim,$type){
    $user = $_SESSION['uname'];
    if($type=='up'){
        $type = 1;
    }else if($type == 'down'){
        $type = -1;
    }

    $sql = "select * from claim_votes where claim_id = '$claim' and user_id = '$user' and up_down = $type";
    $result = mysqli_query($GLOBALS["db"], $sql);
    if(mysqli_num_rows($result)>0)
        return true;
    else
        return false;
}
function claimstatus($claim){
    $user = $_SESSION['uname'];
    $sql = "select * from claim_votes where claim_id = '$claim' and user_id = '$user'";
    $result = mysqli_query($GLOBALS["db"], $sql);
    $resultRecord = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result)>0){
        return $resultRecord['up_down'];
    }
    else
        return null;
}
function claimvotes($claim){
    $upsql = "select ifnull(sum(up_down),0) count from claim_votes where claim_id = '$claim'";
    $upresult = mysqli_query($GLOBALS["db"], $upsql);
    $upresultRecord = mysqli_fetch_assoc($upresult);
    $count = $upresultRecord['count'];
    return $count;
}
function addfav($document,$user){
    $query = "INSERT INTO favorites (document_id,user_id) VALUES ('$document','$user')";
    mysqli_query($GLOBALS["db"],$query);
    if(mysqli_error($GLOBALS["db"])){
        error_log(mysqli_error($GLOBALS["db"]));
        return 500;
    }
    else
        return 200;
}
function remfav($document,$user){
    $query = "delete from favorites where document_id = '$document' and user_id = '$user'";
    mysqli_query($GLOBALS["db"],$query);
    if(mysqli_error($GLOBALS["db"])){
        error_log(mysqli_error($GLOBALS["db"]));
        return 500;
    }
    else
        return 200;
}
function delclaim($claimid,$user){
    $query = "delete from claims where claim_id = '$claimid' and user_id = '$user'";
    mysqli_query($GLOBALS["db"],$query);
    if(mysqli_error($GLOBALS["db"])){
        error_log(mysqli_error($GLOBALS["db"]));
        return 500;
    }
    else
        return 200;
}
function isFavorite($document){
    $user = $_SESSION['uname'];
    $sql = "select * from favorites where document_id = '$document' and user_id = '$user'";
    $result = mysqli_query($GLOBALS["db"], $sql);
    if(mysqli_num_rows($result)>0){
        return true;
    }
    else
        return false;
}
function getFavorites(){
    $user = $_SESSION['uname'];
    $sql = "select document_id from favorites where user_id = '$user'";
    $result = mysqli_query($GLOBALS["db"], $sql);
    $return_arr = array();
    if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($return_arr,$row['document_id']);
        }
        return $return_arr;
    }
    else
        return null;
}
function json_response($code = 200, $message = null)
{
    // clear the old headers
    header_remove();
    // set the actual code
    http_response_code($code);
    // set the header to make sure cache is forced
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    // treat this as json
    header('Content-Type: application/json');
    $status = array(
        200 => '200 OK',
        400 => '400 Bad Request',
        422 => 'Unprocessable Entity',
        500 => '500 Internal Server Error'
    );
    // ok, validation error, or failure
    header('Status: '.$status[$code]);
    // return the encoded json
    return json_encode(array(
        'status' => $code < 300, // success or not?
        'message' => $message
    ));
}
