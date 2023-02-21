<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

<div class="row">
    <div class="col-lg-7">

        <?php echo $this->session->flashdata('message') ?>

        <h4 class="text-success text-right">Role : <?= $role['role'] ?></h4>

        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th>Menu</th>
                    <th>Access</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($menu as $m) : ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $m['menu'] ?></td>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" <?= check_access($role['id'], $m['id']); ?> data-menu="<?= $m['id'] ?>" data-role="<?= $role['id'] ?>">
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>