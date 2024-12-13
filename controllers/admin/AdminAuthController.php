<?php

require_once PATH_MODEL . 'AuthModal.php';

class AdminAuthController
{
    private $message = "";

    public function signIn()
    {
        $viewName = 'sign-in';
        $pageTitle = 'Đăng nhập';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['form_sign_in_admin'])) {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $authModal = new AuthModal();
            $user = $authModal->find('*', 'email = :email AND role = 0', ['email' => $email]);

            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role'] = $user['role'];
                header('Location: ' . BASE_URL_ADMIN);
                exit;
            } else {
                $this->message = 'Email hoặc mật khẩu không chính xác';
            }
        }

        $message = $this->message;

        require_once PATH_VIEW_ADMIN . 'auth-layout.php';
    }
}
