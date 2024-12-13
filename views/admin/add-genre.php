<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Thêm Thể Loại</h4>
                </div>

                <div class="card-body">
                    <?php if (!empty($message)): ?>
                        <div class="alert <?= $message['type'] ?>" role="alert">
                            <?= htmlspecialchars($message['text']) ?>
                        </div>
                    <?php endif; ?>
                    <form method="post">
                        <div class="mb-3">
                            <label for="genre_name" class="form-label">Tên Thể Loại</label>

                            <input
                                type="text"
                                class="form-control"
                                id="genre_name"
                                name="genre_name"
                                placeholder="Nhập tên thể loại"
                                required>
                        </div>

                        <div class="d-grid">
                            <button name="form_add_genre_name" type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>