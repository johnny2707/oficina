<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Client Creation</h2>
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
                        <h3>client info</h3>
                        
                        <div class="mb-3">
                            <label class="form-label">nif</label>
                            <input type="text" class="form-control" placeholder="nif" name="nif">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">name</label>
                            <input type="text" class="form-control" placeholder="name" name="name">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="card mb-5">
                        <div class="card-body contactForm">
                            <h3>default contact</h3>
                            
                            <div class="mb-3">
                                <label class="form-label">description</label>
                                <input type="text" class="form-control" placeholder="description" name="description">
                            </div>
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
                </div>

                <div class="mb-5">
                    <button type="button" class="btn btn-primary w-100 createClient">submit</button>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>