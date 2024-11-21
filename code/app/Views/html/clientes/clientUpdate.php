<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Client Updation</h2>
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
                        <h3>client info</h3>
                        <button class="btn border-0 p-3" data-bs-toggle="modal" data-bs-target="#clientModal"><i class="ti ti-edit"></i></button>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">nif</label>
                        <input type="text" class="form-control" placeholder="nif" name="" value="<?= $clientData['client'][0]['nif'] ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">name</label>
                        <input type="text" class="form-control" placeholder="name" name="" value="<?= $clientData['client'][0]['name'] ?>" disabled>
                    </div>

                    <div class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="clientModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="clientModalLabel">edit client info</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">nif</label>
                                        <input type="text" class="form-control" placeholder="nif" name="modalClientNif" value="<?= $clientData['client'][0]['nif'] ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">name</label>
                                        <input type="text" class="form-control" placeholder="name" name="modalClientName" value="<?= $clientData['client'][0]['name'] ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                                    <button type="button" class="btn btn-primary updateClientInfoButton">save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <div class="card p-4">
                    <h3>contact info</h3>
                    
                    <?php 
                        foreach($clientData['contacts'] as $contact):
                    ?>

                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="p-0 m-0"><?= $contact['description'] ?></h4>
                        <button class="btn border-0 p-3" data-bs-toggle="modal" data-bs-target="#contactModal<?= $contact['description'] ?>"><i class="ti ti-edit"></i></button>
                    </div>
                            
                    <div class="mb-3">
                        <label class="form-label">phone number</label>
                        <input type="text" class="form-control" placeholder="phone number" name="" value="<?= $contact['phone_number'] ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">email address</label>
                        <input type="text" class="form-control" placeholder="email address" name="" value="<?= $contact['email_address'] ?>" disabled>
                    </div>

                    <div class="modal fade" id="contactModal<?= $contact['description'] ?>" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="contactModalLabel">edit contact info</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">description</label>
                                        <input type="text" class="form-control" placeholder="description" name="modalContactDescription" value="<?= $contact['description'] ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">phone number</label>
                                        <input type="text" class="form-control" placeholder="phone number" name="modalContactPhoneNumber" value="<?= $contact['phone_number'] ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">email address</label>
                                        <input type="text" class="form-control" placeholder="email address" name="modalContactEmailAddress" value="<?= $contact['email_address'] ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                                    <button type="button" class="btn btn-primary updateContactInfoButton" data-contact-id="<?= $contact['id'] ?>">save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                        endforeach;                    
                    ?>
                </div>
            </div>

            <?php 
                if($clientData['vehicles'] != [])
                { 
            ?>
                <div class="col-md-12">
                    <div class="card p-4">
                        
                        <h3>car info</h3>                        

                        <?php 
                            foreach($clientData['vehicles'] as $car):
                        ?>
                        <input type="hidden" name="carId" value="<?= $car['id'] ?>">

                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="p-0 m-0"><?= $car['description'] ?></h4>
                            <button class="btn border-0 p-3" data-bs-toggle="modal" data-bs-target="#carModal<?= $car['description'] ?>"><i class="ti ti-edit"></i></button>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">vin</label>
                            <input type="text" class="form-control" placeholder="vin" name="" value="<?= $car['vin'] ?>" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">license plate</label>
                            <input type="text" class="form-control" placeholder="license plate" name="" value="<?= $car['license_plate'] ?>" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">model</label>
                            <input type="text" class="form-control" placeholder="model" name="" value="<?= $car['model'] ?>" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">year</label>
                            <input type="text" class="form-control" placeholder="year" name="" value="<?= $car['year'] ?>" disabled>
                        </div>

                        <div class="modal fade" id="carModal<?= $car['description'] ?>" tabindex="-1" aria-labelledby="carModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="carModalLabel">edit car info</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">description</label>
                                            <input type="text" class="form-control" placeholder="description" name="modalCarDescription" value="<?= $car['description'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">vin</label>
                                            <input type="text" class="form-control" placeholder="vin" name="modalCarVin" value="<?= $car['vin'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">license plate</label>
                                            <input type="text" class="form-control" placeholder="license plate" name="modalCarLicensePlate" value="<?= $car['license_plate'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">model</label>
                                            <input type="text" class="form-control" placeholder="model" name="modalCarModel" value="<?= $car['model'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">year</label>
                                            <input type="text" class="form-control" placeholder="year" name="modalCarYear" value="<?= $car['year'] ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                                        <button type="button" class="btn btn-primary updateCarInfoButton" data-car-id="<?= $car['id'] ?>">save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            endforeach;                    
                        ?>
                    </div>
                </div>
            <?php 
                } 
            ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>