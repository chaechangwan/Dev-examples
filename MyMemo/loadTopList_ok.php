<?php
    include './include/dbconn.php';
    $isEnd = false;
    $sql = "SELECT max(memo_idx) FROM tb_memo WHERE memo_check = 'y'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $end_idx = $row['max(memo_idx)'];

    $topListPage = $_GET['topListPage'];
    $startPage = $topListPage * 3;
    $sql = "SELECT * FROM tb_memo WHERE memo_check = 'y' LIMIT $startPage, 3";
    $result = mysqli_query($conn, $sql);
    if($result){ /*result에 아무것도 안들어와도 if문 안으로 들어온다. isset해도 마찬가지. DB연결이 안된 경우에는 못들어옴.*/
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
            
            if($row->memo_idx == $end_idx){
                $isEnd = true;
            }
        }
        if(mysqli_num_rows($result) == 0){
            $isEnd = true;
        }
        
        $obj_isend = new stdClass();
        $obj_isend->isEnd = $isEnd;
        $arr[] = $obj_isend;
        unset($obj_isend);
    }else{
        $arr = array(0=>'Empty');
    }

    echo json_encode($arr);
?>