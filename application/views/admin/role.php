<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


<div class="row">
    <div class="col-lg-7">

        <?= form_error('menu', '<div class="text-danger pl-3">', '</div>') ?>

        <?php echo $this->session->flashdata('message') ?>

        <a href="<?= base_url('admin/role') ?>" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#exampleModal">
            Add New Role
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
                foreach ($role as $r) : ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $r['role'] ?></td>
                        <td>
                            <a class="badge badge-warning badge-sm" href="<?= base_url('admin/roleAccess/' . $r['id']) ?>">Access</a>
                            <a class="badge badge-success badge-sm" href="<?= base_url('menu/edit/' . $r['id']) ?>">Edit</a>
                            <a class="badge badge-danger badge-sm" href="">Delete</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/role') ?>" method="post">
                    <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <input type="text" name="role" class="form-control" id="role" placeholder="Role name">
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