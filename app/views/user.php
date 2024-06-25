<div class="photos-content container-fluid">
    <div class="card">
        <h2>Upload Image</h2>
        <?php if (!empty($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form action="/my_photos" method="post" enctype="multipart/form-data">
            <input type="text" name="name" id="name" placeholder="Name" required>
            <input type="file" name="image" id="image" required>
            <button type="submit">Upload</button>
        </form>
    </div>
</div>
<div class="my-photos-table">
    <h1>My Photos</h1>
    <table>
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($photos)): ?>
            <?php foreach ($photos as $photo): ?>
                <tr>
                    <td><img src="<?php echo $photo->image; ?>" alt="<?php echo htmlspecialchars($photo->name); ?>"></td>
                    <td><?php echo htmlspecialchars($photo->name); ?></td>
                    <td class="actions">
                        <a href="/edit.php?id=<?php echo $photo->id; ?>" class="btn btn-edit">Edit</a>
                        <a href="/delete.php?id=<?php echo $photo->id; ?>" class="btn btn-delete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No photos available</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>