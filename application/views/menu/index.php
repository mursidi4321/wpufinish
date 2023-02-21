<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


<div class="row">
    <div class="col-lg-7">

        <?= form_error('menu', '<div class="text-danger pl-3">', '</div>') ?>

        <?php echo $this->session->flashdata('message') ?>

        <a href="" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#exampleModal">
            Add New Menu
        </a>
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th>Menu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($menu as $m) : ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $m['menu'] ?></td>
                        <td>
                            <a class="badge badge-success badge-sm" href="<?= base_url('menu/edit/' . $m['id']) ?>">Edit</a>
                            <a class="badge badge-danger badge-sm" href="<?= base_url('menu/delete/' . $m['id']) ?>" onclick="return confirm('Yakin mau hapus?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('menu') ?>" method="post">
                    <div class="form-group row">
                        <label for="menu" class="col-sm-2 col-form-label">Menu</label>
                        <div class="col-sm-10">
                            <input type="text" name="menu" class="form-control" id="menu" placeholder="Menu name">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>