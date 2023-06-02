<?php
session_start();
if (isset($_SESSION["userid"]))
    $userid = $_SESSION["userid"];
else
    $userid = "";
if (isset($_SESSION["username"]))
    $username = $_SESSION["username"];
else
    $username = "";
if (isset($_SESSION["userlevel"]))
    $userlevel = $_SESSION["userlevel"];
else
    $userlevel = "";
if (isset($_SESSION["userpoint"]))
    $userpoint = $_SESSION["userpoint"];
else
    $userpoint = "";
?>
<div id="top">
    <h3>
        <a href="index.php">
            <span class="maintitle">씨앗</span>
            <span class="subtitle">SEED</span>
        </a>
    </h3>
    <ul id="top_menu">
        <?php
        if (!$userid) {
            ?>
            <li><a href="member_form.php">회원 가입</a> </li>
            <li> | </li>
            <li><a href="login_form.php">로그인</a></li>
            <?php
        } else {
            $logged = $username . "&nbsp;님";
            ?>
            <li>
                <?= $logged ?>
            </li>
            <li> | </li>
            <li><a href="logout.php">로그아웃</a> </li>
            <li> | </li>
            <li><a href="member_modify_form.php">정보 수정</a></li>
            <?php
        }
        ?>
        <?php
        if ($userlevel == 1) {
            ?>
            <li> | </li>
            <li><a href="admin.php">관리자 모드</a></li>
            <?php
        }
        ?>
    </ul>
</div>
<div id="menu_bar">
    <ul id="navi">
        <li class="menu_opt"><a href="index.php">Home</a></li>
        <li class="menu_opt"><a href="message_form.php">쪽지</a></li>
        <li class="menu_opt"><a href="board_list.php">게시판</a></li>
        <li class="menu_opt"><a href="board_form.php">질문하기</a></li>
        <li class="menu_opt"><a href="ps_enter.php" target='_blank'>문제 풀러가기</a></li>
    </ul>
</div>