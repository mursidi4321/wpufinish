<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<div class="row">
    <div class="col-lg-8">


        <?php echo form_open_multipart('user/edit/') ?>
        <div class="form-group row">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control form-control-sm" id="email" readonly value="<?= $user['email'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Full Name</label>
            <div class="col-sm-10">
                <input type="text" value="<?= $user['name'] ?>" class="form-control form-control-sm" name="name" id="name">
                <?= form_error('name', '<small class="text-danger pl-1">', '</small>') ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">Picture</div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?= base_url('assets/img/profile/' . $user['image']) ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label for="custom-file" class="custom-file-label">Choose File</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            </div>
        </div>

        </form>
    </div>
</div>