<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<div class="col-lg-8">
    <?php echo $this->session->flashdata('message') ?>
</div>
<div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img class="p-2" style="width:150px;" src="<?= base_url('assets/img/profile/' . $user['image']) ?>">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $user['name'] ?></h5>
                <p class="card-text"><?= $user['email'] ?></p>
                <p class="card-text"><small class="text-muted">Member Since : <?= date('d M Y', $user['date_created'])  ?></small></p>
            </div>
        </div>
    </div>
</div>