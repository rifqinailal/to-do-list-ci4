<?= $this->extend('home') ?>

<?= $this->section('content') ?>

<div class="m-5">
    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <h1 class="text-3xl font-extrabold">
        Daftar Pekerjaan Yang Telah kamu buat
    </h1>
    <a href="#"><!-- Open the modal using ID.showModal() method -->
        <button class="p-2 rounded-lg bg-base-300 font-semibold hover:bg-base-200" onclick="my_modal_1.showModal()">Tambah</button>
        <dialog id="my_modal_1" class="modal">
            <div class="modal-box">
                <div>
                    <form action="/create" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Judul</span>
                            </label>
                            <input type="text" placeholder="Masukkan judul tugas" class="input input-bordered w-full"
                                name="title" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Deskripsi</span>
                            </label>
                            <input type="text" placeholder="Masukkan deskripsi tugas" class="input input-bordered w-full"
                                name="description" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Deadline</span>
                            </label>
                            <input type="date" placeholder="Pilih tanggal deadline" class="input input-bordered w-full"
                                name="deadline" />
                        </div>
                        <button type="submit" class="btn btn-secondary mt-2">Tambah</button>
                    </form>
                </div>
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                </div>
            </div>
        </dialog>
    </a>
</div>
<div class="m-5 flex flex-col md:flex-row md:justify-center md:gap-5 md:border rounded-lg md:h-[460px] md:border-black">
    <?php if (isset($tasks) && is_array($tasks)): ?>
        <?php foreach ($tasks as $item): ?>
            <div class=" m-2 card w-96 h-52 bg-base-100 shadow-xl">
                <div class="card-body">
                    <div class="flex flex-row items-center gap-2">
                        <h2 class="card-title"><?= $item['title'] ?></h2>
                        <div class="w-28 text-center">
                            <h1 class=" bg-base-300 p-1 rounded-lg font-semibold">
                                <?= date('d/m/Y', strtotime($item['deadline'])) ?>
                            </h1>
                        </div>
                    </div>
                    <p><?= $item['description'] ?></p>
                    <div class="card-actions justify-end">
                        <!-- <span class="badge <?= $item['status'] === 'completed' ? 'badge-success' : 'badge-warning' ?>">
                            <?= $item['status'] ?>
                        </span> -->
                        <a href="/detail/<?= $item['id'] ?>"><button class="bg-base-300 p-2 rounded-lg font-semibold">Detail</button></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No tasks found</p>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>