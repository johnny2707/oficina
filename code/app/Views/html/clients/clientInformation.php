<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title"><?= $clientData['client'][0]['name'] ?></h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card p-4">
                    <h3>client info</h3>

                    <input type="hidden" name="clientId" value="<?= $clientData['client'][0]['id'] ?>">

                    <div class="mb-3">
                        <label class="form-label">nif</label>
                        <input type="text" class="form-control" placeholder="nif" name="clientNif" value="<?= $clientData['client'][0]['nif'] ?>" readonly disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">name</label>
                        <input type="text" class="form-control" placeholder="name" name="clientName" value="<?= $clientData['client'][0]['name'] ?>" readonly disabled>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <div class="card p-4">
                    <h3>contact info</h3>
                    
                    <?php 
                        foreach($clientData['contacts'] as $contact):
                    ?>

                    <h4><?= $contact['description'] ?></h4>
                            
                    <div class="mb-3">
                        <label class="form-label">phone number</label>
                        <input type="text" class="form-control" placeholder="phone number" name="" value="<?= $contact['phone_number'] ?>" readonly disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">email address</label>
                        <input type="text" class="form-control" placeholder="email address" name="" value="<?= $contact['email_address'] ?>" readonly disabled>
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

                        <h4><?= $car['description'] ?></h4>
                                
                        <div class="mb-3">
                            <label class="form-label">vin</label>
                            <input type="text" class="form-control" placeholder="vin" name="" value="<?= $car['vin'] ?>" readonly disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">license plate</label>
                            <input type="text" class="form-control" placeholder="license plate" name="" value="<?= $car['license_plate'] ?>" readonly disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">model</label>
                            <input type="text" class="form-control" placeholder="model" name="" value="<?= $car['model'] ?>" readonly disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">year</label>
                            <input type="text" class="form-control" placeholder="year" name="" value="<?= $car['year'] ?>" readonly disabled>
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