<div class="top-up-container">
    <div class="top-up-card">
        <h1 class="top-up-title">Nạp tiền</h1>
        <p class="top-up-description">
            Quy tắc chuyển đổi: <strong>1,000 VNĐ = 1 coin</strong>
        </p>

        <?php if (!empty($message)) : ?>
            <p class="top-up-message"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <?php if (!empty($pendingRequest) && is_array($pendingRequest)) : ?>
            <div class="top-up-status">
                <p>Trạng thái yêu cầu hiện tại: <strong><?= htmlspecialchars($pendingRequest['status']) ?></strong></p>
            </div>
        <?php else : ?>
            <form action="" method="POST" class="top-up-form">
                <label for="amount" class="top-up-label">Số tiền nạp (VNĐ):</label>
                <input
                    type="number"
                    id="amount"
                    name="amount"
                    class="top-up-input"
                    placeholder="Nhập số tiền VNĐ"
                    min="1000"
                    step="1000"
                    required>
                <button type="submit" class="top-up-button">Gửi yêu cầu nạp tiền</button>
            </form>
        <?php endif; ?>

        <div class="top-up-options">
            <h3>Cách nạp tiền:</h3>
            <div class="option">
                <label>
                    <input type="radio" name="payment_method" value="bank_transfer" onchange="togglePaymentInfo('bank')" />
                    Chuyển khoản ngân hàng
                </label>
            </div>
            <div class="option">
                <label>
                    <input type="radio" name="payment_method" value="qr_code" checked onchange="togglePaymentInfo('qr')" />
                    Quét mã QR
                </label>
            </div>
        </div>

        <div id="payment-info">
            <!-- Thông tin ngân hàng -->
            <div id="bank-info" class="payment-info hidden">
                <h4 style="margin-bottom: 5px; font-weight: 600;">Thông tin chuyển khoản:</h4>
                <p><strong>Ngân hàng:</strong> Ngân hàng TP BANK</p>
                <p><strong>Số tài khoản:</strong> 0428 2025 201</p>
                <p><strong>Chủ tài khoản:</strong> LE DAI AN</p>
            </div>

            <!-- Mã QR -->
            <div id="qr-info" class="qr-container visible">
                <h4>Quét mã QR:</h4>
                <img src="<?= PATH_ASSETS_UPLOAD . '/imgs/qr_code.png' ?>" alt="QR Code" />
            </div>
        </div>

        <div class="top-up-info">
            <p>Sau khi gửi yêu cầu, admin sẽ phê duyệt giao dịch của bạn trong vòng <strong>24 giờ</strong>.</p>
        </div>
    </div>
</div>