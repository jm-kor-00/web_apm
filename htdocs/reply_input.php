<?php
$id = $_POST["id"];
$pass = $_POST["pw"];
$content = $_POST["content"];
$regist_day = date("Y-m-d (H:i)");

$num = $_GET["num"];
$page = $_GET["page"];
$goto = "board_view.php?num={$num}&page={$page}";

// echo $id;
// echo " ,";
// echo $pass;
// echo " ,";
// echo $content;
// echo " ,";
// echo $regist_day;
// echo " ,";
// echo $num;
// echo " ,";
// echo $page;

$con = mysqli_connect("localhost", "user1", "12345", "sample");
$sql_select = "select * from members where id='$id' and pass='$pass'";
$result = mysqli_query($con, $sql_select);
$isUser = mysqli_num_rows($result);

echo "<br> $isUser 개";
if($isUser == 0) {
    echo("
    <script>
    window.alert('등록되지 않은 아이디, 혹은 비밀번호가 틀렸습니다.');
          history.go(-1);
    </script>");
}
else{
    $sql_input = "insert into reply (idx, con_num, name, pw, content, date)";
    $sql_input .= "values('null', '$num', '$id', '$pass', '$content', '$regist_day')";
    mysqli_query($con, $sql_input);
    mysqli_close($con);
    echo("<script>
        location.replace('{$goto}');
    </script>");
}
?>