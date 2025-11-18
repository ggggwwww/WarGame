<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');

    // 가정: 이미 로그인되어 세션에 사용자 ID 존재
    if (!isset($_SESSION['uid'])) {
    http_response_code(401);
    exit('login required');
    }

    // 취약: CSRF 토큰 없음, Origin/Referer 검증 없음
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    // 아주 단순한 유효성만
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit('invalid email');
    }

    // 가짜 DB 반영
    $_SESSION['email'] = $email;

    // 워게임 조건: 특정 이메일로 변경되면 flag 공개
    $flag = 'flag{csrf_email_change_won}';
    if ($email === 'admin-verified@target.local') {
        echo "OK. FLAG: {$flag}";
    } else {
        echo "OK";
    }
    exit;
    }
?>