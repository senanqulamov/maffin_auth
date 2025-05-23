<?php
require_once __DIR__ . '/../Controller.php';
require_once __DIR__ . '/../models/User.php';

class AuthController extends Controller {
    private $userModel;
    public function __construct() {
        $this->userModel = new User();
        session_start();
    }

    /**
     * Display a login form of the user.
     */
    public function showLogin() {
        $this->view('auth/login');
    }

    /**
     * Authentication of the user.
     */
    public function login() {
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $user = $this->userModel->findByUserName($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $this->redirect('/');
        } else {
            $error = 'Please register with Maffin registration form :)';
            $this->view('auth/login', compact('error'));
        }
    }

    /**
     * Display a register form of the user.
     */
    public function showRegister() {
        $this->view('auth/register');
    }

    /**
     * Create a new user from register form.
     */
    public function register() {
        $data = [
            'username'     => $_POST['username'],
            'password' => $_POST['password'],
            'created_at' => date('Y-m-d H:i:s'),
        ];

        try {
            if ($this->userModel->create($data)) {
                $this->redirect('/login');
            } else {
                $register_error = 'Maffin Servers are FUll , sorry!';
                $this->view('auth/register', compact('register_error'));
            }
        }catch (Exception $e) {
            echo $e->getMessage();
            echo $e->getTraceAsString();
        }

    }

    /**
     * Logout the user.
     */
    public function logout() {
        session_destroy();
        $this->redirect('/login');
    }
}