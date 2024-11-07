<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Mechanic Updation</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
        <div class="col-md-12 mb-3">
                <div class="card p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>mechanic info</h3>
                        <button class="btn border-0 p-3" data-bs-toggle="modal" data-bs-target="#mechanicModal"><i class="ti ti-edit"></i></button>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">name</label>
                        <input type="text" class="form-control" placeholder="name" name="" value="<?= $mechanicData[0]['name'] ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">role</label>
                        <input type="text" class="form-control" placeholder="role" name="" value="<?= $mechanicData[0]['role'] ?>" disabled>
                    </div>

                    <h3>contact info</h3>
                            
                    <div class="mb-3">
                        <label class="form-label">phone number</label>
                        <input type="text" class="form-control" placeholder="phone number" name="" value="<?= $mechanicData[0]['phone_number'] ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">email address</label>
                        <input type="text" class="form-control" placeholder="email address" name="" value="<?= $mechanicData[0]['email_address'] ?>" disabled>
                    </div>

                    <div class="modal fade" id="mechanicModal" tabindex="-1" aria-labelledby="mechanicModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="mechanicModalLabel">edit mechanic info</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">name</label>
                                        <input type="text" class="form-control" placeholder="name" name="mechanicModalName" value="<?= $mechanicData[0]['name'] ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">role</label>
                                        <input type="text" class="form-control" placeholder="role" name="mechanicModalRole" value="<?= $mechanicData[0]['role'] ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">phone number</label>
                                        <input type="text" class="form-control" placeholder="phone number" name="mechanicModalPhoneNumber" value="<?= $mechanicData[0]['phone_number'] ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">email address</label>
                                        <input type="text" class="form-control" placeholder="email address" name="mechanicModalEmailAddress" value="<?= $mechanicData[0]['email_address'] ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                                    <button type="button" class="btn btn-primary updateMechanicInfoButton">save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>