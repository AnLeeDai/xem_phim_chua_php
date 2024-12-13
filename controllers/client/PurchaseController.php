<?php
require_once PATH_MODEL . 'MoviesModal.php';
require_once PATH_MODEL . 'PurchasesModal.php';
require_once PATH_MODEL . 'UsersModal.php';
require_once PATH_MODEL . 'TransactionsModal.php';

class PurchaseController
{
    public function buyMovie()
    {
        // Giả sử đã session_start() và user_id có trong session
        $currentUserId = $_SESSION['user_id'] ?? null;
        if (!$currentUserId) {
            header('Location: ?action=sign-in');
            exit;
        }

        $movieId = $_POST['movie_id'] ?? null;
        if (!$movieId) {
            // Không có movie_id => không mua được
            header('Location: ?action=/&msg=no_movie_id');
            exit;
        }

        $moviesModal = new MoviesModal();
        $purchasesModal = new PurchasesModal();
        $usersModal = new UsersModal();
        $transactionsModal = new TransactionsModal();

        $movie = $moviesModal->find('*', 'movie_id = :movie_id', ['movie_id' => $movieId]);
        if (!$movie) {
            header('Location: ?action=/&msg=movie_not_found');
            exit;
        }

        // Kiểm tra đã mua chưa
        if ($purchasesModal->hasPurchased($currentUserId, $movieId)) {
            header('Location: ?action=/&msg=already_purchased');
            exit;
        }

        $user = $usersModal->find('*', 'user_id = :user_id', ['user_id' => $currentUserId]);
        if ($user['coin_balance'] < $movie['price']) {
            header('Location: ?action=/&msg=not_enough_coin');
            exit;
        }

        // Sử dụng transaction
        $pdo = $purchasesModal->getPDO();
        $pdo->beginTransaction();
        try {
            // Trừ coin
            $newBalance = $user['coin_balance'] - $movie['price'];
            $usersModal->update(['coin_balance' => $newBalance], 'user_id = :user_id', ['user_id' => $currentUserId]);

            // Thêm purchase
            $purchasesModal->addPurchase($currentUserId, $movieId);

            // Ghi lại transaction mua phim
            $transactionsModal->insert([
                'user_id' => $currentUserId,
                'amount' => $movie['price'],
                'transaction_type' => 'purchase'
            ]);

            $pdo->commit();

            header('Location: ?action=/&msg=buy_success');
            exit;
        } catch (Exception $e) {
            $pdo->rollBack();
            header('Location: ?action=/&msg=buy_error');
            exit;
        }
    }
}
