<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


<div class="row">
    <div class="col-lg">


        <small class="text-danger text-sm"><?= validation_errors() ?></small>

        <ul class="text-danger pl-3"> </ul>


        <?php echo $this->session->flashdata('message') ?>

        <a href="" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#exampleModal">
            Add New Submenu
        </a>
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th>Title</th>
                    <th>Sub Menu</th>
                    <th>Url</th>
                    <th>Icon</th>
                    <th>Is Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($submenu as $sm) : ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $sm['title'] ?></td>
                        <td><?= $sm['menu'] ?></td>
                        <td><?= $sm['url'] ?></td>
                        <td><?= $sm['icon'] ?></td>
                        <td><?= $sm['is_active'] ?></td>
                        <td>
                            <a class="badge badge-success badge-sm" href="<?= base_url('menu/editSubMenu/' . $sm['id']) ?>">Edit</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Add New Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">Submenu Title</label>
                        <div class="col-sm-8">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Submenu Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="menu_id" class="col-sm-4 col-form-label">Menu</label>
                        <div class="col-sm-8">
                            <select name="menu_id" id="menu_id" class="form-control form-control-sm">
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="url" class="col-sm-4 col-form-label">Submenu url</label>
                        <div class="col-sm-8">
                            <input type="text" name="url" class="form-control" id="url" placeholder="Submenu url">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="icon" class="col-sm-4 col-form-label">Submenu icon</label>
                        <div class="col-sm-8">
                            <input type="text" name="icon" class="form-control" id="icon" placeholder="Submenu icon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active">
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
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