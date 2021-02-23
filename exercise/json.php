<?php
$conn = mysqli_connect('localhost', 'root', '1234', 'frontenddb');
$sql = "SELECT * FROM tb_member";
$result = mysqli_query($conn, $sql);
if($result){
    $o = array();
    while($row = mysqli_fetch_object($result)){
        $t = new stdClass(); //객체 생성
        $t->idx = $row->mem_idx;
        $t->userid = $row->mem_userid;
        $t->userpw = $row->mem_userpw;
        $o[] = $t;
        unset($t); //변수삭제
    }
}else{
    $o = array(0 => 'empty'); //연계배열. (키와 값을가진다.)
}

echo json_encode($o);
?>