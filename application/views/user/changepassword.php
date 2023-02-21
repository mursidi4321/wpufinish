<h1 class="h3 mb-4 text-gray-800 text-center"><?= $title ?></h1>
<div class="row">
    <div class="col-lg-7 mx-auto">

        <?php echo $this->session->flashdata('message') ?>

        <form action="<?= base_url('user/changepassword') ?>" method="post">
            <form>
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" value="<?= set_value('current_password') ?>" autofocus id="current_password" name="current_password">
                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="new_password1">New Password</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="new_password2">Confirm Password</label>
                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div>
                    <button type="submint" class="btn btn-primary">Change Password</button>
                </div>

            </form>
        </form>
    </div>
</div>