<div style="width: 100%;">
    <h1 style="margin-bottom: 16px; text-align: center; color: #333; font-weight: 600">Đăng Nhập</h1>

    <?php if (!empty($message)): ?>
        <div style="margin-bottom: 16px; padding: 12px; background-color: <?= ($message === 'Đăng nhập thành công') ? '#d4edda' : '#f8d7da'; ?>; color: <?= ($message === 'Đăng nhập thành công') ? '#155724' : '#721c24'; ?>; border: 1px solid <?= ($message === 'Đăng nhập thành công') ? '#c3e6cb' : '#f5c6cb'; ?>; border-radius: 4px;">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <div class="input-container">
            <label for="email" class="input-label">Email</label>
            <input type="email" id="email" name="email" placeholder="Nhập email" class="input input-medium">
        </div>

        <div class="input-container" style="margin-top: 16px;">
            <label for="password" class="input-label">Mật khẩu</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" class="input input-medium">
        </div>

        <button type="submit" name="form_sign_in" class="btn btn-primary btn-medium" style="width: 100%; margin-top: 24px;">Đăng Nhập</button>
        <p style="margin-top: 16px; text-align: center; font-size: 14px; color: #777;">Chưa có tài khoản? <a href="<?= BASE_URL_CLIENT . '?action=sign-up' ?>" style="color: var(--primary-color); text-decoration: none;">Đăng ký</a></p>
    </form>
</div>