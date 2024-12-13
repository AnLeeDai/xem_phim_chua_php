<div class="container mt-5">
    <h1 class="text-center">Quản lý yêu cầu nạp tiền</h1>

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Số tiền</th>
                <th>Trạng thái</th>
                <th>Thời gian</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requests as $request): ?>
                <tr>
                    <td><?= htmlspecialchars($request['request_id']) ?></td>
                    <td><?= htmlspecialchars($request['user_id']) ?></td>
                    <td><?= htmlspecialchars($request['amount']) ?> VNĐ</td>
                    <td><?= htmlspecialchars($request['status']) ?></td>
                    <td><?= htmlspecialchars($request['created_at']) ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="request_id" value="<?= htmlspecialchars($request['request_id']) ?>">
                            <select name="status" class="form-select form-select-sm">
                                <option value="pending" <?= $request['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="approved" <?= $request['status'] === 'approved' ? 'selected' : '' ?>>Approved</option>
                                <option value="rejected" <?= $request['status'] === 'rejected' ? 'selected' : '' ?>>Rejected</option>
                            </select>
                            <button type="submit" name="form_update_request_status" class="btn btn-sm btn-primary mt-1">Cập nhật</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
