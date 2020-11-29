<?php require APP_ROOT . '/views/inc/header.php' ?>
<?php flash('address_message'); ?>
    <a href="<?php echo URL_ROOT; ?>/client" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="row mb-3">
        <div class="col-md-6 title-subpage">
            <h3>Adresses</h3>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URL_ROOT ?>/client/<?php echo $data['clientId']?>/address/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Add Address
            </a>
        </div>
    </div>
    <div class="card card-body mb-3">
        <div class="card-block">
            <div class="table">
                <table class="table table-sm table-condensed">
                    <thead>
                    <tr>
                        <th>Description</th>
                        <th>CEP</th>
                        <th>Street</th>
                        <th>Number</th>
                        <th>Neighborhood</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
            <?php foreach($data['adresses'] as $address) : ?>
                    <tr>
                        <td><?php echo $address->description; ?></td>
                        <td><?php echo $address->cep; ?></td>
                        <td><?php echo $address->street; ?></td>
                        <td><?php echo $address->number; ?></td>
                        <td><?php echo $address->neighborhood; ?></td>
                        <td><?php echo $address->city; ?></td>
                        <td><?php echo $address->state; ?></td>
                        <td><?php echo $address->country; ?></td>
                        <td>
                            <div class="wrapper">
                                <form id="delete-button" action="<?php echo URL_ROOT; ?>/client/<?php echo $data['clientId'];?>/address/<?php echo $address->id; ?>/delete/" method="post">
                                    <input  type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                                &nbsp;
                                <a id="edit-button" href="<?php echo URL_ROOT; ?>/client/<?php echo $data['clientId'];?>/address/<?php echo $address->id; ?>/edit/" class="btn btn-dark btn-sm">Edit</a>
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