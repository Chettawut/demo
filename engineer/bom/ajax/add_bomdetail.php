<?php
	header('Content-Type: application/json');
    include('../../../conn.php');
    date_default_timezone_set("Asia/Bangkok");

    $sql = "SELECT a.stno FROM bom as a  ";
    $sql .= " WHERE a.stcodemain='".$_POST["stcodemain"]."'  order by a.stno desc LIMIT 1 ";
    $query = mysqli_query($conn,$sql);
    $row2 = $query->fetch_assoc();
       
        $StrSQL = "INSERT INTO bom (stcodemain , stcode  , amount , unit";
                
       //sono ต้องอยู่ท้ายตลอด
        $StrSQL .= ", stno)";
        $StrSQL .= "VALUES (";
        $StrSQL .= "'".$_POST['stcodemain']."', '". $_POST['stcode'] ."', '1' , '".$_POST['unit']."' ";            
        $StrSQL .= ", '".($row2["stno"]+1)."' ) ";
        $query = mysqli_query($conn,$StrSQL);

        

        
        if($query) {
            echo json_encode(array('status' => '1','message'=> 'เพิ่มรายการ สำเร็จ'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> $StrSQL));
        }

    
    // echo $StrSQL;

    
        
?>