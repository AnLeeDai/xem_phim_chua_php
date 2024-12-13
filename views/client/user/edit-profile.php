<div class="edit-profile-container">
    <div class="edit-profile-card">
        <h1 class="edit-profile-title">Chỉnh sửa thông tin</h1>
        <?php if (!empty($message)): ?>
            <p class="edit-profile-message"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <form action="" method="POST" class="edit-profile-form">
            <div class="form-group">
                <label for="username">Tên người dùng:</label>
                <input type="text" id="username" name="username" value="<?= htmlspecialchars($user['username'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu mới (nếu muốn đổi):</label>
                <input type="password" id="password" name="password" placeholder="Để trống nếu không đổi">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Cập nhật thông tin</button>
        </form>
    </div>
</div>