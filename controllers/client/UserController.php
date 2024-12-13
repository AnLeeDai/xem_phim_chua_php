<?php

require_once PATH_MODEL . 'PurchasesModal.php';
require_once PATH_MODEL . 'RequestsModal.php';
require_once PATH_MODEL . 'UsersModal.php';

class UserController
{
    public function editProfile()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL_CLIENT . '?action=sign-in');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $userModel = new UsersModal();
        $message = '';

        // Lấy thông tin hiện tại của người dùng
        $user = $userModel->find('*', 'user_id = :user_id', ['user_id' => $userId]);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            // Kiểm tra dữ liệu
            if (empty($username) || empty($email)) {
                $message = 'Tên người dùng và Email không được để trống.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = 'Địa chỉ email không hợp lệ.';
            } else {
                // Cập nhật thông tin người dùng
                $updateData = [
                    'username' => $username,
                    'email' => $email,
                ];

                // Nếu có mật khẩu mới, hash và cập nhật
                if (!empty($password)) {
                    $updateData['password_hash'] = password_hash($password, PASSWORD_DEFAULT);
                }

                $userModel->update($updateData, 'user_id = :user_id', ['user_id' => $userId]);
                $message = 'Cập nhật thông tin thành công.';
                $user = $userModel->find('*', 'user_id = :user_id', ['user_id' => $userId]);
            }
        }

        // Truyền thông tin đến View
        $viewName = 'user/edit-profile';
        $pageTitle = 'Chỉnh sửa thông tin';
        require_once PATH_VIEW_CLIENT . 'layouts/main.php';
    }

    public function purchaseHistory()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL_CLIENT . '?action=sign-in');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $purchasesModal = new PurchasesModal();

        $movies = $purchasesModal->getPurchasedMoviesByUser($userId);

        $viewName = 'user/purchase-history';
        $pageTitle = 'Lịch sử phim đã mua';

        require_once PATH_VIEW_CLIENT . 'layouts/main.php';
    }

    public function topUp()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL_CLIENT . '?action=sign-in');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $requestsModal = new RequestsModal();
        $message = '';

        $pendingRequest = $requestsModal->getPendingRequestByUser($userId);

        if (!$pendingRequest) {
            $pendingRequest = null;
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($pendingRequest) {
                $message = 'Bạn đã có yêu cầu nạp tiền đang ở trạng thái "' . htmlspecialchars($pendingRequest['status']) . '". Vui lòng chờ xử lý trước khi gửi yêu cầu mới.';
            } else {
                $amountVND = $_POST['amount'] ?? 0;

                if ($amountVND <= 0 || !is_numeric($amountVND)) {
                    $message = 'Số tiền nạp không hợp lệ.';
                } else {
                    $requestData = [
                        'user_id' => $userId,
                        'amount' => $amountVND,
                        'status' => 'pending',
                    ];

                    $requestsModal->insertRequest($requestData);
                    $message = "Yêu cầu nạp $amountVND VNĐ đã được gửi, chờ admin phê duyệt.";
                }
            }
        }

        $viewName = 'user/top-up';
        $pageTitle = 'Nạp tiền';
        require_once PATH_VIEW_CLIENT . 'layouts/main.php';
    }
}
