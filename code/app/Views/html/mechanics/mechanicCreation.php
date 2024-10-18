<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Mechanic Creation</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12">

                <div class="card mb-5">
                    <div class="card-body">
                        <h3>mechanic info</h3>
                        <div class="mb-3">
                            <label class="form-label">name</label>
                            <input type="text" class="form-control" placeholder="name" name="name">
                        </div>
                    
                        <h3>mechaniccontact</h3>
                        
                        <div class="mb-3">
                            <label class="form-label">phone number</label>
                            <input type="text" class="form-control" placeholder="phone number" name="phoneNumber">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">email address</label>
                            <input type="text" class="form-control" placeholder="email address" name="emailAddress">
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <button type="button" class="btn btn-primary w-100 createMechanic">submit</button>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>