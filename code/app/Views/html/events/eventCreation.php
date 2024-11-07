<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Event Creation</h2>
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
                        <h3>event info</h3>

                        <div class="mb-3">
                            <label class="form-label">type</label>
                            <select name="eventType" class="form-control">
                                <option value="0">select a type</option>
                                <?php 
                                    foreach($types as $type)
                                    {
                                ?>
                                    <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                                <?php 
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">description</label>
                            <input type="text" class="form-control" placeholder="description" name="eventDescription">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">date</label>
                            <input type="date" class="form-control" name="eventDate">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">start time</label>
                            <input type="time" class="form-control" name="eventStart">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">finish time</label>
                            <input type="time" class="form-control" name="eventFinish">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">mechanic</label>
                            <select class="form-control" name="eventMechanic">
                                <option value="0">select a mechanic (optional)</option>
                                <?php 
                                    foreach($mechanics as $mechanic)
                                    {
                                ?>
                                <option value="<?= $mechanic['id'] ?>"><?= $mechanic['name'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <button type="button" class="btn btn-primary w-100 createEvent">submit</button>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>