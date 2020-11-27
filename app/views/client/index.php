<?php require APP_ROOT . '/views/inc/header.php' ?>
<?php flash('client_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6 title-subpage">
            <h3>Clients</h3>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URL_ROOT; ?>/client/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Add Client
            </a>
        </div>
    </div>
    <div class="card card-body mb-3">
        <div class="card-block">
            <div class="table">
                <table class="table table-sm table-condensed">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Birth Date</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
            <?php foreach($data['clients'] as $client) : ?>
                    <tr>
                        <td><?php echo $client->name; ?></td>
                        <td><?php echo date_format(date_create($client->birth_date), 'd/m/Y'); ?></td>
                        <td><?php echo $client->cpf; ?></td>
                        <td><?php echo $client->rg; ?></td>
                        <td><?php echo $client->phone; ?></td>
                        <td>
                            <div class="wrapper">
                                <form id="delete-button" action="<?php echo URL_ROOT; ?>/client/<?php echo $client->id; ?>/delete" method="post">
                                    <input  type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                                &nbsp;
                                <a id="edit-button" href="<?php echo URL_ROOT; ?>/client/<?php echo $client->id; ?>/edit/" class="btn btn-dark btn-sm">Edit</a>
                                <a id="address-button" href="<?php echo URL_ROOT; ?>/client/<?php echo $client->id; ?>/address" class="btn btn-dark btn-sm">Adresses</a>
                            </div>
                        </td>
                    </tr>
            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require APP_ROOT . '/views/inc/footer.php' ?>