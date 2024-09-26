<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Client List</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <table class="table table-dark table-responsive table-striped">
                        <thead>
                            <th>id</th>
                            <th>nif</th>
                            <th>name</th>
                            <th>creation date</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($clientData as $client)
                                {
                                    echo "<tr>";
                                    echo "<td>".$client['id']."</td>";
                                    echo "<td>".$client['nif']."</td>";
                                    echo "<td>".$client['name']."</td>";
                                    echo "<td>".$client['creation_date']."</td>";
                                    echo "</tr>";
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