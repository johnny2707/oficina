<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Add Info</h2>
            </div>
            <div class="col"> 
                <h4 class="mb-0 w-100 text-end">costumer: <?= $clientData['client'][0]['name'] ?></h4>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">

            <div class="col-md-12 mb-3">
                <div class="card p-4">
                    <h3>contact info</h3>
                    
                    <?php 
                        foreach($clientData['contacts'] as $contact):
                    ?>

                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="p-0 m-0"><?= $contact['description'] ?></h4>
                    </div>
                            
                    <div class="mb-3">
                        <label class="form-label">phone number</label>
                        <input type="text" class="form-control" placeholder="phone number" name="" value="<?= $contact['phone_number'] ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">email address</label>
                        <input type="text" class="form-control" placeholder="email address" name="" value="<?= $contact['email_address'] ?>" disabled>
                    </div>
                    
                    <?php
                        endforeach;                    
                    ?>

                    <button name="addContactButton" class="btn btn-primary addContactButton" data-bs-toggle="modal" data-bs-target="#contactModal">+</button>

                    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="contactModalLabel">add contact info</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">description</label>
                                        <input type="text" class="form-control" placeholder="description" name="modalContactDescription">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">phone number</label>
                                        <input type="text" class="form-control" placeholder="phone number" name="modalContactPhoneNumber">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">email address</label>
                                        <input type="email" class="form-control" placeholder="email address" name="modalContactEmailAddress">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                                    <button type="button" class="btn btn-primary addContactModalButton">save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-md-12">
                <div class="card p-4">
                    
                    <h3>car info</h3>                        

                    <?php 
                    if($clientData['vehicles'] != [])
                    { 
                        foreach($clientData['vehicles'] as $car):
                    ?>
                    <input type="hidden" name="carId" value="<?= $car['id'] ?>">

                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="p-0 m-0"><?= $car['description'] ?></h4>
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
                    
                    <?php
                        endforeach;        
                    }            
                    ?>

                    <button name="addCarButton" class="btn btn-primary addCarButton" data-bs-toggle="modal" data-bs-target="#carModal">+</button>

                    <div class="modal fade" id="carModal" tabindex="-1" aria-labelledby="carModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="carModalLabel">add car info</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">description</label>
                                        <input type="text" class="form-control" placeholder="description" name="modalCarDescription">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">vin</label>
                                        <input type="text" class="form-control" placeholder="vin" name="modalCarVin">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">license plate</label>
                                        <input type="text" class="form-control" placeholder="license plate" name="modalCarLicensePlate">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">model</label>
                                        <input type="text" class="form-control" placeholder="model" name="modalCarModel">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">year</label>
                                        <input type="text" class="form-control" placeholder="year" name="modalCarYear">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                                    <button type="button" class="btn btn-primary addCarModalButton">save</button>
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