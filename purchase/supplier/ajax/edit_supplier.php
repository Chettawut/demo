<?php
	header('Content-Type: application/json');
	include('../../../conn.php');
    
    date_default_timezone_set("Asia/Bangkok");
    
    $strSQL = "UPDATE supplier SET ";
    $strSQL .= "supcode='".$_POST["supcode"]."',supname='".$_POST["supname"]."' ";
    $strSQL .= "idno='".$_POST["idno"]."',road='".$_POST["road"]."',subdistrict='".$_POST["subdistrict"]."' ";
    $strSQL .= "district='".$_POST["district"]."',province='".$_POST["province"]."',zipcode='".$_POST["zipcode"]."' ";
    $strSQL .= "tel='".$_POST["tel"]."',fax='".$_POST["fax"]."',taxnumber='".$_POST["taxnumber"]."' ";
    $strSQL .= "email='".$_POST["email"]."',status='".$_POST["status"]."' ";
    $strSQL .= "WHERE code= '".$_POST["code"]."' ";


    
	$query = mysqli_query($conn,$strSQL);
    
    // echo $strSQL;


        if($query) {
            echo json_encode(array('status' => '1','message'=> 'แก้ไขผู้ขาย '.$_POST["supname"].' สำเร็จ'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    
        mysqli_close($conn);
?>