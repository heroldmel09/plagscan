<?php

namespace Demo;

// include_once('vendor/copyleaks/php-plagiarism-checker/autoload.php');
include_once('../autoload.php');
include_once('./demo.php');

use Demo\Test;

$USER_EMAIL = 'turlaglenn@gmail.com'; // change this with your own copyleaks email.
$USER_KEY = '8c4ece7a-a27c-4dc8-a3a3-fe06a5e0879c'; // change this with your own copyleaks API key.
$WEBHOOK_URL = 'https://8c06-120-29-72-233.ngrok-free.app/plagscan/completionWebhook.php'; //exe https://glacial-refuge-96501.herokuapp.com/10b0z2w1

$test = new Test();
$test->run($USER_EMAIL, $USER_KEY, $WEBHOOK_URL);
