<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Client List</h2>
            </div>
            <!-- <div class="col">
                <input type="text" class="form-control w-50 ms-auto" placeholder="choose client" name="clientSearch">
            </div> -->
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <!-- <div class="col-md-12 mb-5" id="clientSearchList">
                <div class="card p-4">
                    <table class="table table-dark table-responsive table-striped" id="clientSearchListTable">
                        <thead>
                            <th>id</th>
                            <th>nif</th>
                            <th>name</th>
                            <th>creation date</th>
                        </thead>
                        <tbody id="clientSearchListData">
                            
                        </tbody>
                    </table>
                </div>
            </div> -->
            <div class="col-md-12">
                <div class="card p-4">
                    <table class="table table-dark table-responsive table-striped" id="clientList">
                        <thead>
                            <th>nif</th>
                            <th>name</th>
                            <th>creation date</th>
                            <th>actions</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($clientData as $client)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $client['nif'] ?></td>
                                        <td><?= $client['name'] ?></td>
                                        <td><?= $client['creation_date'] ?></td>
                                        <td>
                                            <a href="<?= base_url('clients/showClientPage/'.$client["id"]) ?>" class='btn btn-primary me-3' data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="show"><i class='ti ti-eye'></i></a>
                                            <a href="<?= base_url('clients/updateClientPage/'.$client["id"]) ?>" class='btn btn-success me-3' data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="edit"><i class='ti ti-pencil'></i></a>
                                            <button data-bs-toggle="modal" data-bs-target="#deleteModal<?= $client['id'] ?>" class='btn btn-danger' data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="delete"><i class='ti ti-trash'></i></button>
                                        
                                            <div class="modal fade" id="deleteModal<?= $client['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5 text-dark" id="deleteModalLabel">Apagar Cliente</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-dark">Quer apagar o cliente <?= $client['name'] ?>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" name="deleteButton" class="btn btn-danger deleteButton" data-client-id="<?= $client['id'] ?>">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>