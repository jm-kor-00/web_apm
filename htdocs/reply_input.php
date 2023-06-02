<?php
$id = $_POST["ID"];
$password = $_POST["PW"];
$content = $_POST["content"];
$regist_day = date("Y-m-d (H:i)");

$con = mysqli_connect("localhost", "user1", "12345", "sample");
$sql_select = "select id from members where id=$id";
$id = mysqli_query($con, $sql);
// 아이디찾았는지 if문 확인
// 아니면 탈출
// 비번맞는지 확인하는 sql
// if문으로 확인
// 아니면 탈출

//다 통과하면 insert
//원래 글로 고

?>