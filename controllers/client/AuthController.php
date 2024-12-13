<?php

require_once PATH_MODEL . 'AuthModal.php';

class AuthController
{
    private $message = "";

    public function signIn()
    {
        $viewName = 'auth/signIn';
        $pageTitle = 'Đăng nhập';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_sign_in'])) {
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (empty($email) || empty($password)) {
                $this->message = 'Vui lòng điền đầy đủ thông tin';
            } else {
                $authModel = new AuthModal();
                $user = $authModel->find('*', 'email = :email', ['email' => $email]);

                if ($user && password_verify($password, $user['password_hash'])) {
                    if ($user['role'] == 0) {
                        $this->message = 'Bạn không có quyền đăng nhập bằng tài khoản này';
                    } else {
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['role'] = $user['role'];
                        header('Location: ' . BASE_URL_CLIENT);
                        exit;
                    }
                } else {
                    $this->message = 'Email hoặc mật khẩu không chính xác';
                }
            }
        }

        $message = $this->message;
        require_once PATH_VIEW_CLIENT . 'layouts/auth.php';
    }


    public function signUp()
    {
        $viewName = 'auth/signUp';
        $pageTitle = 'Đăng Ký';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_sign_up'])) {
            $fullname = trim($_POST['fullname'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
            $confirmPassword = trim($_POST['confirm-password'] ?? '');

            if (empty($fullname) || empty($email) || empty($password) || empty($confirmPassword)) {
                $this->message = 'Vui lòng điền đầy đủ thông tin';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->message = 'Email không hợp lệ';
            } elseif ($password !== $confirmPassword) {
                $this->message = 'Mật khẩu và xác nhận mật khẩu không khớp';
            } else {
                $authModel = new AuthModal();
                $existingUser = $authModel->find('*', 'email = :email', ['email' => $email]);

                if ($existingUser) {
                    $this->message = 'Email đã được sử dụng';
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $newUser = [
                        'username' => $fullname,
                        'email' => $email,
                        'password_hash' => $hashedPassword,
                        'coin_balance' => 100,
                        'role' => 1,
                    ];

                    if ($authModel->insert($newUser)) {
                        $this->message = 'Đăng ký thành công';
                        header('Location: ' . BASE_URL_CLIENT . '?action=sign-in');
                        exit;
                    } else {
                        $this->message = 'Đăng ký thất bại, vui lòng thử lại';
                    }
                }
            }
        }

        $message = $this->message;
        require_once PATH_VIEW_CLIENT . 'layouts/auth.php';
    }

    public function signOut()
    {
        session_destroy();
        header('Location: ' . BASE_URL_CLIENT . '?action=sign-in');
        exit();
    }
}
