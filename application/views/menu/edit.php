<h1 class="h3 mb-4 text-gray-800  "><?= $title ?></h1>

<div class="row">
    <div class="col-lg-6">
        <form action="<?= base_url('menu/process') ?>" method="post">
            <div class="form-group row">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <label for="menu" class="col-sm-4 col-form-label">Menu name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="menu" value="<?= $row['menu'] ?>" autofocus name="menu">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-primary">Save Edit</button>
                    <a href="<?= base_url('menu') ?>" class="btn btn-success">Back Menu</a>

                </div>
            </div>
        </form>
    </div>
</div>