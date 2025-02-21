<?= $this->extend('home') ?>

<?= $this->section('content') ?>

<div class="m-5 flex justify-center">
    <?php if (isset($task) && !empty($task)): ?>
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="flex flex-row items-center gap-5">
                    <h2 class="card-title pb-3 border-b border-base-300 w-full"><?= $task['title'] ?></h2>
                </div>
                <h1 class="font-semibold">Status</h1>
                <h1><?= $task['status'] ?></h1>
                <!-- <span class=" <?= $task['status'] === 'completed' ? 'badge-success' : 'badge-warning' ?>">
                    <?= $task['status'] ?>
                </span> -->
                <div class="">
                    <h1 class="font-semibold">Deadline</h1>
                    <h1 class="">
                        <?= date('d/m/Y', strtotime($task['deadline'])) ?>
                    </h1>
                </div>
                <div class="">
                    <h1 class="font-semibold">Tanggal di buat</h1>
                    <h1 class="">
                        <?= date('d/m/Y', strtotime($task['created_at'] ?? $task['updated_at'])) ?>
                    </h1>
                </div>
                <h1 class="font-semibold">Deskripsi</h1>
                <p><?= $task['description'] ?></p>
                <div class="card-actions justify-between">
                    <a href="/index" class="btn btn-secondary">Back to List</a>
                    <form action="/delete/<?= $task['id'] ?>" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus task ini?');">
                        <button type="submit" class="btn btn-error">Delete</button>
                    </form>
                    <a href="/index" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-error">
            <p>Task not found</p>
            <a href="/index" class="btn btn-primary">Back to List</a>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>