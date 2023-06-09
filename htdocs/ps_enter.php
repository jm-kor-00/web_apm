<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PHP 프로그래밍 입문</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/common.css?after">
    <link rel="stylesheet" type="text/css" href="./css/main.css?after">
    <link rel="stylesheet" type="text/css" href="./css/sites.css?after">
</head>

<body>
    <div id="wrap">
        <header>
            <?php include "header.php"; ?>
        </header>
        <section>
            <div id="sites">
                <h3>Recommended</h3>
                <div id="BOJ" class="site">
                    <h4><a href="https://www.acmicpc.net/"target='_blank'>백준 온라인 저지</a></h4>
                    <p>
                        한국 사이트, 대기업/프로그래밍 대회 기출문제 다수 포함, 간편한 접근성, 그룹/문제집 기능<br>
                        <a href="https://www.acmicpc.net/group/5170"target='_blank'> >> 씨앗 그룹 가입 신청 << </a>
                    </p>
                </div>
                <div id="COF" class="site">
                    <h4><a href="https://codeforces.com/"target='_blank'>CODE FORCES</a></h4>
                    <p> 
                        영국 사이트, 매주 실시간 콘테스트 개최, 영어문제 학습 가능, 인정받는 Rating 시스템<br>
                    </p>
                </div>
                <div id="KJ" class="site">
                    <h4><a href="https://judge.koreatech.ac.kr/"target='_blank'>코리아텍 저지</a></h4>    
                    <p>
                        한기대 저지 사이트, 대회 기출문제 포함, 알고리즘 수업 문제 공부가능
                    </p>
                </div>
            </div>
        </section>
        <footer>
            <?php include "footer.php"; ?>
        </footer>
    </div>
</body>

</html>