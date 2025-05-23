<?php
require_once __DIR__ . '/../app/controllers/AuthController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$auth = new AuthController();

// Simple Routes/web.php logic for a core php project

switch ($url) {
    case '/':
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        require __DIR__ . '/../views/home/welcome.php';
        break;
    case '/login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->login();
        } else {
            $auth->showLogin();
        }
        break;

    case '/register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->register();
        } else {
            $auth->showRegister();
        }
        break;
    case '/logout':
        $auth->logout();
        break;
    default:
        http_response_code(404);
        echo " Maffin didn't create this page yet :( ";
}