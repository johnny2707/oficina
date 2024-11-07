<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title"><?= $mechanicData[0]['name'] ?></h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card p-4">
                    <h3>mechanic info</h3>

                    <div class="mb-3">
                        <label class="form-label">name</label>
                        <input type="text" class="form-control" placeholder="name" name="clientName" value="<?= $mechanicData[0]['name'] ?>" readonly disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">role</label>
                        <input type="text" class="form-control" placeholder="role" name="mechanicModalRole" value="<?= $mechanicData[0]['role'] ?>" readonly disabled>
                    </div>

                    <h3>contact info</h3>
                            
                    <div class="mb-3">
                        <label class="form-label">phone number</label>
                        <input type="text" class="form-control" placeholder="phone number" name="" value="<?= $mechanicData[0]['phone_number'] ?>" readonly disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">email address</label>
                        <input type="text" class="form-control" placeholder="email address" name="" value="<?= $mechanicData[0]['email_address'] ?>" readonly disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>