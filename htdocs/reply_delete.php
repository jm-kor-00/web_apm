<?php
    $num   = $_GET["num"];
    $page   = $_GET["page"];
    $idx   = $_GET["idx"];
    echo"{$num},{$page}<br>";

    $goto = "board_view.php?num={$num}&page={$page}";

    $con = mysqli_connect("localhost", "user1", "12345", "sample");

    $sql = "delete from reply where idx = $idx";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    echo("<script>location.replace('{$goto}');</script>");
?>