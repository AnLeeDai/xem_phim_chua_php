<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow" style="width: 100%; max-width: 400px;">
        <div class="card-header bg-primary text-white text-center">
            <h3>Admin Login</h3>
        </div>

        <div class="card-body">
            <?php if (!empty($message)): ?>
                <div class="alert <?= $message === 'Login successful' ? 'alert-success' : 'alert-danger' ?>" role="alert">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="d-grid">
                    <button name="form_sign_in_admin" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>