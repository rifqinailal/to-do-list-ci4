<?= $this->extend('home') ?>

<?= $this->section('content') ?>

<div class="m-5 flex flex-row gap-5">
    <?php if(isset($tasks) && is_array($tasks)): ?>
        <?php foreach($tasks as $item): ?>
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body">
                    <div class="flex flex-row items-center gap-5">
                        <h2 class="card-title"><?= $item['title'] ?></h2>
                        <div class="w-28 text-center">
                            <h1 class="text-white bg-[#f149c7] p-2 rounded-lg font-semibold">
                                <?= date('d/m/Y', strtotime($item['created_at'] ?? $item['updated_at'])) ?>
                            </h1>
                        </div>
                    </div>
                    <p><?= $item['description'] ?></p>
                    <div class="card-actions justify-end">
                        <span class="badge <?= $item['status'] === 'completed' ? 'badge-success' : 'badge-warning' ?>">
                            <?= $item['status'] ?>
                        </span>
                        <button class="btn bg-[#f149c7] text-white">Detail</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No tasks found</p>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>