<?php
    $val = $_POST['key'];
    include './include/dbconn.php';
    $sql = "SELECT * FROM tb_memo WHERE memo_content LIKE '%$val%'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $arr = array();
        while($row = mysqli_fetch_object($result)){
            $obj = new stdClass();
            $obj->memo_idx = $row->memo_idx;
            $obj->memo_content = $row->memo_content;
            $obj->memo_file = $row->memo_file;
            $obj->memo_check = $row->memo_check;
            $obj->memo_regdate = $row->memo_regdate;
            $arr[] = $obj;
            unset($obj);
        }
    }else{
        $arr = array(0 => 'Empty');
    }

    echo json_encode($arr);
?>