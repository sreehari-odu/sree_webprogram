<?php
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
    $sql = "select user_id,claim,can_reproduce,source_code,datasets,experiments_and_results,claim_date,fname,lname from claims,users where claims.user_id = users.uname and document_id = $document";
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