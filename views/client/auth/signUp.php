<div style="width: 100%;">
    <h1 style="margin-bottom: 16px; text-align: center; color: #333; font-weight: 600">Đăng Ký</h1>

    <?php if (!empty($message)): ?>
        <div style="margin-bottom: 16px; padding: 12px; background-color: <?= ($message === 'Đăng ký thành công') ? '#d4edda' : '#f8d7da'; ?>; color: <?= ($message === 'Đăng ký thành công') ? '#155724' : '#721c24'; ?>; border: 1px solid <?= ($message === 'Đăng ký thành công') ? '#c3e6cb' : '#f5c6cb'; ?>; border-radius: 4px;">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <div class="input-container">
            <label for="fullname" class="input-label">Họ và Tên</label>
            <input type="text" id="fullname" name="fullname" placeholder="Nhập họ và tên" class="input input-medium">
        </div>

        <div class="input-container" style="margin-top: 16px;">
            <label for="email" class="input-label">Email</label>
            <input type="email" id="email" name="email" placeholder="Nhập email" class="input input-medium">
        </div>

        <div class="input-container" style="margin-top: 16px;">
            <label for="password" class="input-label">Mật Khẩu</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" class="input input-medium">
        </div>

        <div class="input-container" style="margin-top: 16px;">
            <label for="confirm-password" class="input-label">Xác Nhận Mật Khẩu</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Xác nhận mật khẩu" class="input input-medium">
        </div>

        <button type="submit" name="form_sign_up" class="btn btn-primary btn-medium" style="width: 100%; margin-top: 24px">Đăng Ký</button>
        <p style="margin-top: 16px; text-align: center; font-size: 14px; color: #777;">Đã có tài khoản? <a href="<?= BASE_URL_CLIENT . '?action=sign-in' ?>" style="color: var(--primary-color); text-decoration: none;">Đăng Nhập</a></p>
    </form>
</div>