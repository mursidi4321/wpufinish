<h1 class="h3 mb-4 text-gray-800  "><?= $title ?></h1>

<div class="row">
    <div class="col-lg-6">
        <form action="" method="post">
            <div class="form-group row">
                <input type="hidden" name="id" value="<?= $sm['id'] ?>">
                <label for="title" class="col-sm-4 col-form-label">Submenu Title</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="title" value="<?= $sm['title'] ?>" autofocus name="title">
                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="menu" class="col-sm-4 col-form-label">Menu</label>
                <div class="col-sm-8">
                    <select name="menu" id="" class="form-control">
                        <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="url" class="col-sm-4 col-form-label">Url</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="icon" class="col-sm-4 col-form-label">Icon</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon'] ?>">
                </div>
            </div>
            <fieldset class="form-group row">
                <legend class="col-form-label col-sm-4 float-sm-left pt-0">Status</legend>
                <div class="col-sm-8">
                    <div class="form-check">
                        <input class="form-check-input" <?= $sm['is_active'] == 1 ? 'checked' : null ?> name="is_active" value="1" type="checkbox" id="is_active">
                        <label class="form-check-label" for="is_active">
                            is Active?
                        </label>
                    </div>
            </fieldset>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save Edit</button>
                    <a href="<?= base_url('menu/submenu') ?>" class="btn btn-success ml-3">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>