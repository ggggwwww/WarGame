<?php
// problem_01.php
// 로고/배경은 그대로 유지하며, 문제 영역 UI만 흰색의 세련된 오버레이 패널로 수정 (문제 번호 및 로고 폰트 통일)
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The First Star: Problem 01</title>
    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700;ital@1&display=swap" rel="stylesheet">
    <style>
        /* --- 로고/배경 유지 (이전 버전 스타일) --- */
        body {
            /* 살짝 어두운 밤하늘 배경 (그라데이션 복원) */
            background: linear-gradient(to bottom, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            margin: 0;
            padding: 0;
            overflow-y: auto;
            font-family: Arial, sans-serif;
            color: white;
            min-height: 100vh;
        }

        /* 배경에 의미 없는 작은 별들 추가 */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                radial-gradient(2px 2px at 20px 30px, #eee, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 80px 70px, #eee, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 150px 150px, #eee, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 200px 80px, #eee, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 250px 20px, #eee, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 300px 90px, #eee, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 350px 40px, #eee, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 400px 110px, #eee, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 450px 60px, #eee, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 500px 130px, #eee, rgba(0,0,0,0));
            background-size: 500px 500px;
            opacity: 0.7;
            animation: moveStars 100s linear infinite;
            z-index: -1;
        }

        @keyframes moveStars {
            from { background-position: 0 0; }
            to { background-position: 100% 100%; }
        }

        /* 로고 스타일 (Kalam 폰트 유지) */
        #logo {
            position: absolute;
            top: 20px;
            left: 30px;
            display: flex;
            align-items: flex-end;
            z-index: 100;
            cursor: pointer;
            text-decoration: none;
        }

        .logo-text {
            font-family: 'Kalam', cursive; /* index.php와 동일한 폰트 유지 */
            font-size: 3.5em;
            color: #E0E0E0;
            line-height: 1;
            position: relative;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        /* 별 로고 스타일 복원 */
        .logo-star {
            width: 60px;
            height: 60px;
            position: absolute;
            right: -10px;
            top: -30px;
            z-index: 10;
            filter: drop-shadow(0 0 8px #FFEA00);
        }

        /* SVG 필터 정의 (scribble-filter 복원) */
        #logo-svg-filters {
            position: absolute;
            width: 0;
            height: 0;
        }

        /* ------------------------------------------------------------------ */
        /* --- ✨ 문제 영역 UI 개선 (흰색의 세련된 오버레이 패널) --- */
        /* ------------------------------------------------------------------ */

        /* 중앙 컨텐츠 컨테이너 (흰색 패널) */
        #problem-container {
            width: 80%;
            max-width: 950px;
            margin: 150px auto 50px auto;
            padding: 40px;

            /* 흰색 배경 */
            background-color: rgba(255, 255, 255, 0.95); /* 거의 불투명한 화이트 */
            backdrop-filter: none;
            -webkit-backdrop-filter: none;

            border-radius: 5px;

            /* 얇고 샤프한 경계선 및 그림자 */
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);

            color: #333; /* 내부 텍스트 색상 변경 */
        }

        /* 문제 제목 스타일 */
        #problem-container h1 {
            font-family: Arial, sans-serif; /* 성숙한 디자인을 위해 H1은 일반 폰트 유지 */
            font-size: 2.2em;
            color: #1A1A1A;
            text-shadow: none;

            /* 얇고 간결한 구분선 */
            border-bottom: 1px solid #CCCCCC;
            padding-bottom: 15px;
            margin-bottom: 35px;
            text-align: left;
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* 문제 설명 및 내용이 들어갈 영역 (가독성 최우선) */
        #content-area {
            min-height: 300px;
            padding: 25px;
            /* 배경색을 컨테이너보다 살짝 어둡게하여 시각적 분리 */
            background-color: #F8F8F8;

            border: none;
            border-radius: 3px;
            margin-bottom: 30px;
            line-height: 1.6;
            color: #333333;
            font-size: 1em;
        }
        #content-area strong {
            color: #0077B6;
        }
        #content-area ul {
            list-style: disc;
            padding-left: 20px;
        }
        #content-area li::before {
            content: none;
        }
        #content-area pre {
            background-color: #EEEEEE;
            border: 1px solid #DDDDDD;
            padding: 10px;
            overflow-x: auto;
            font-family: monospace;
            color: #000000;
        }

        /* 플래그 입력 영역 틀 */
        #flag-submission {
            padding: 20px;
            border-top: 1px solid #CCCCCC;
            border-radius: 0;
            background-color: transparent;
            text-align: right;
        }
        #flag-submission label {
            font-weight: 700;
            color: #1A1A1A;
            font-size: 1em;
            margin-right: 15px;
        }
        /* 입력 필드 모던화 */
        #flag-submission input[type="text"] {
            padding: 10px 15px;
            margin-right: 20px;
            width: 45%;
            max-width: 350px;
            border: 1px solid #AAAAAA;
            border-radius: 3px;
            background-color: #FFFFFF;
            color: #1A1A1A;
            font-size: 1em;
            outline: none;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s;
        }
        #flag-submission input[type="text"]:focus {
            border-color: #0077B6;
        }

        /* 버튼 모던화 */
        #flag-submission button {
            padding: 10px 25px;
            background-color: #0077B6;
            color: #FFFFFF;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 700;
            transition: background-color 0.2s, box-shadow 0.2s;
        }

        #flag-submission button:hover {
            background-color: #005A99;
            box-shadow: 0 0 5px rgba(0, 119, 182, 0.5);
        }

        #flag-submission p {
            display: none;
        }
    </style>
</head>
<body>

    <svg id="logo-svg-filters" style="position: absolute; width: 0; height: 0;">
        <filter id="scribble-filter" x="-50%" y="-50%" width="200%" height="200%">
            <feTurbulence type="fractalNoise" baseFrequency="0.7" numOctaves="3" result="noise" seed="1"/>
            <feMorphology in="noise" operator="dilate" radius="0.5" result="noise2"/>
            <feDisplacementMap in="SourceGraphic" in2="noise2" scale="2.5" xChannelSelector="R" yChannelSelector="G" result="scribbled"/>
            <feGaussianBlur in="scribbled" stdDeviation="0.5" result="blur"/>
            <feBlend in="SourceGraphic" in2="blur" mode="multiply"/>
        </filter>
    </svg>

    <a href="index.php" id="logo">
        <span class="logo-text">STARMAP</span>
        <svg class="logo-star" width="60" height="60" viewBox="0 0 50 50">
            <path d="M 25 4 L 46 44 L 4 19 L 46 19 L 4 44 Z"
                  id="logo-star-path"
                  fill="none"
                  stroke="#FFEA00"
                  stroke-width="3"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  style="filter: url(#scribble-filter);"/>
        </svg>
    </a>

    <div id="problem-container">
        <h1></h1>

        <div id="content-area">
          
            
        </div>

        <div id="flag-submission">
            <form action="submit_flag.php" method="POST">
                <label for="flag">**ENTER FLAG:**</label>
                <input type="text" id="flag" name="flag" placeholder="FLAG{...}" required>
                <button type="submit">SUBMIT</button>
            </form>
        </div>

    </div>
</body>
</html>