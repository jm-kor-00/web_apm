<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>PHP 프로그래밍 입문</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dongle&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/common.css">
	<link rel="stylesheet" type="text/css" href="./css/board.css">
	<script>
		function check_input() {
			if (!document.replyForm.id.value) {
				alert("아이디를 입력하세요!");
				document.replyForm.ID.focus();
				return;
			}
			if (!document.replyForm.pw.value) {
				alert("비밀번호를 입력하세요!");
				document.replyForm.PW.focus();
				return;
			}
			if (!document.replyForm.content.value) {
				alert("내용을 입력하세요!");
				document.replyForm.content.focus();
				return;
			}
			document.replyForm.submit();
		}
	</script>
</head>

<body>
	<div id="wrap">
		<header>
			<?php include "header.php"; ?>
		</header>
		<section>
			<div id="main_img_bar">
				<img src="./img/main3_img.png">
			</div>
			<div id="board_box">
				<h3 class="title">
					게시판 > 내용보기
				</h3>
				<?php
				$num = $_GET["num"];
				$page = $_GET["page"];

				$con = mysqli_connect("localhost", "user1", "12345", "sample");
				$sql = "select * from board where num=$num";
				$result = mysqli_query($con, $sql);
			
				$row = mysqli_fetch_array($result);
				$id = $row["id"];
				$name = $row["name"];
				$regist_day = $row["regist_day"];
				$subject = $row["subject"];
				$content = $row["content"];
				$file_name = $row["file_name"];
				$file_type = $row["file_type"];
				$file_copied = $row["file_copied"];
				$hit = $row["hit"];

				$content = str_replace(" ", "&nbsp;", $content);
				$content = str_replace("\n", "<br>", $content);

				$new_hit = $hit + 1;
				$sql = "update board set hit=$new_hit where num=$num";
				mysqli_query($con, $sql);
				// 댓글 정보 가져오는 SQL문
				$sql2 = "select * from reply where con_num=$num";
				$replys = mysqli_query($con, $sql2);
				$total_reply = mysqli_num_rows($replys);
				?>
				<ul id="view_content">
					<li style="font-size:35px;">
						<span class="col1"><b>제목 :</b>
							<?= $subject ?>
						</span>
						<span class="col2">
							<?= $name ?> |
							<?= $regist_day ?>
						</span>
					</li>
					<li>
						<?php
						if ($file_name) {
							$real_name = $file_copied;
							$file_path = "./data/" . $real_name;
							$file_size = filesize($file_path);

							echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
						}
						?>
						<p style="font-size:25px; margin-bottom:10px;">
							<?= $content ?>
						</p>
					</li>
				</ul>
				<!-- 댓글출력기능 -->
				<span id="replyTitle">댓글</span>
				<ul id="reply_view">
					<?php
					for ($i = 0; $i < $total_reply; $i++) {
						mysqli_data_seek($replys, $i);
						$row = mysqli_fetch_array($replys);
						$idx = $row["idx"];
						$con_num = $row["con_num"];
						$name = $row["name"];
						$pw = $row["pw"];
						$content = $row["content"];
						$date = $row["date"];

						$sql3 = "select name from members where id = '$name'";
						$id_search = mysqli_query($con, $sql3);
						$row_id = mysqli_fetch_array($id_search);
						$rname = $row_id["name"];
						?>
						<li>
							<span class="r_name">
								<?= $rname ?>
							</span>
							<span class="r_time">
								<?= $date ?>
							</span>
							<?php
							if (isset($_SESSION["userid"])) {
								if ($name == $_SESSION["userid"]) {
									$goto = "reply_delete.php?idx={$idx}&page={$page}&num={$num}";
									echo "<a id='del_rep' href={$goto}>삭제</a>";
								}
							}
							?>
						</li>
						<span class="r_content">
							<?= $content ?>
						</span>
						<div class="blank"></div>

					<?php }$page = $_GET["page"]; ?>
					<li>
						<form method= "POST" id="replyForm" name="replyForm" action='reply_input.php?page=<?=$page?>&num=<?=$num?>'>
							<span class="newAC">ID&nbsp;</span><input name="id" size="12" type="text">
							<span class="newAC">&nbsp;PW&nbsp;</span><input name="pw" size="15" type="password"><br>
							<textarea name="content" cols="75" rows="6"></textarea><br>
							<button type="button" onclick="check_input()">댓글달기</button>
						</form>
					</li>
				</ul>
				<!-- 댓글출력종료 -->
				<ul class="buttons">
					<li><button onclick="location.href='board_list.php?page=<?= $page ?>'">목록</button></li>
					<li><button
							onclick="location.href='board_modify_form.php?num=<?= $num ?>&page=<?= $page ?>'">수정</button>
					</li>
					<li>
						<button onclick="location.href='board_delete.php?num=<?= $num ?>&page=<?= $page ?>'">삭제</button>
					</li>
					<li><button onclick="location.href='board_form.php'">글쓰기</button></li>
				</ul>
			</div> <!-- board_box -->
		</section>
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</div>
</body>

</html>