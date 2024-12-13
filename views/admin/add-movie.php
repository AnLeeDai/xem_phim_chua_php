<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Thêm Mới Phim</h4>
                </div>
                <div class="card-body">
                    <?php if (!empty($message)): ?>
                        <div class="alert <?= $message['type'] ?>" role="alert">
                            <?= htmlspecialchars($message['text']) ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= BASE_URL_ADMIN ?>&action=add-movie" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Tên Phim</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tên phim" required>
                        </div>
                        <div class="mb-3">
                            <label for="genre_id" class="form-label">Thể Loại</label>
                            <select class="form-select" id="genre_id" name="genre_id" required>
                                <option value="">Chọn thể loại</option>
                                <?php foreach ($genres as $genre): ?>
                                    <option value="<?= $genre['genre_id'] ?>"><?= htmlspecialchars($genre['genre_name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="release_date" class="form-label">Ngày Phát Hành</label>
                            <input type="date" class="form-control" id="release_date" name="release_date">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá (Coin)</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá" min="0">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô Tả</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập mô tả"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="banner" class="form-label">Hình Ảnh (Banner)</label>
                            <input type="file" class="form-control" id="banner" name="banner" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="video_url" class="form-label">Tải Lên Video (URL hoặc Tệp)</label>
                            <input type="file" class="form-control" id="video_url" name="video_url" accept="video/*">
                        </div>
                        <div class="mb-3">
                            <label for="download_url" class="form-label">Tải Lên Tệp Tải Xuống</label>
                            <input type="file" class="form-control" id="download_url" name="download_url" accept=".zip,.rar,.7z,.pdf,.mp4">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Thêm Phim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
