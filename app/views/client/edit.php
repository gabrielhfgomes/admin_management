<?php require APP_ROOT . '/views/inc/header.php' ?>
<a href="<?php echo URL_ROOT; ?>/client" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h3>Edit client</h3>
        <form action="<?php echo URL_ROOT; ?>/client/<?php echo $data['id']; ?>/edit/" method="post">
           <?php require APP_ROOT . '/views/client/inputs.php'; ?>
           <input type="submit" class="btn btn-success" value="Save"/>
        </form>
        </div>
    </div>
</div>
<?php require APP_ROOT . '/views/inc/footer.php' ?>