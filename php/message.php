<?php

        header('Content-Type: text/plain; charset=UTF-8');
        session_start();

        $message = (string)($_POST['message'] ?? '');
        if (strlen($message) > 1024) {
        $message = substr($message, 0, 1024);
        }

        $history = (string)($_COOKIE['history'] ?? '');
        $message_history = $history . $message . "\n";

        $THRESHOLD = 2048;
       

        // 먼저 history 쿠키를 설정
        setcookie('history', $message_history, [
        'expires' => time()+360000,
        'path' => '/',
        'samesite' => 'Lax',
        ]);


        $len = strlen($message_history);
        if ($len > $THRESHOLD && $len < 3500) { // 브라우저 한계 여유
        $FLAG = 'flag{cookie_threshold_triggered}';
        setcookie('flag', $FLAG, [
            'expires' => time()+360000,
            'path' => '/',
            'samesite' => 'Lax',
            // 'httponly' => true, // 의도에 따라
        ]);
        }

        $to = 'problem08.php';
        if (!empty($_SERVER['HTTP_REFERER']) && parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) === $_SERVER['HTTP_HOST']) {
        $to = $_SERVER['HTTP_REFERER'];
        }
        header('Location: '.$to);
        exit;

    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'problem08.php')); exit;
?>