<!DOCTYPE html>
<div class="form-group">
    <label for="name">Description: <sup>*</sup></label>
    <input type="text" name="description" class="form-control form-control <?php echo (!empty($data['description_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['description']; ?>">
    <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
</div>
<div class="form-group">
    <label for="name">CEP: <sup>*</sup></label>
    <input id="cep" type="text" name="cep" class="form-control form-control <?php echo (!empty($data['cep_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['cep']; ?>">
    <span class="invalid-feedback"><?php echo $data['cep_err']; ?></span>
</div>
<div class="form-group">
    <label for="name">Street: <sup>*</sup></label>
    <input id="street" type="text" name="street" class="form-control form-control <?php echo (!empty($data['street_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['street']; ?>">
    <span class="invalid-feedback"><?php echo $data['street_err']; ?></span>
</div>
<div class="form-group">
    <label for="name">Number: <sup>*</sup></label>
    <input id="number" type="text" name="number" class="form-control form-control <?php echo (!empty($data['number_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['number']; ?>">
    <span class="invalid-feedback"><?php echo $data['number_err']; ?></span>
</div>
<div class="form-group">
    <label for="name">Neighborhood: <sup>*</sup></label>
    <input id="neighborhood" type="text" name="neighborhood" class="form-control form-control <?php echo (!empty($data['neighborhood_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['neighborhood']; ?>">
    <span class="invalid-feedback"><?php echo $data['neighborhood_err']; ?></span>
</div>
<div class="form-group">
    <label for="name">City: <sup>*</sup></label>
    <input id="city" type="text" name="city" class="form-control form-control <?php echo (!empty($data['city_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['city']; ?>">
    <span class="invalid-feedback"><?php echo $data['city_err']; ?></span>
</div>
<div class="form-group">
    <label for="name">State: <sup>*</sup></label>
    <input id="state" type="text" name="state" class="form-control form-control <?php echo (!empty($data['state_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['state']; ?>">
    <span class="invalid-feedback"><?php echo $data['state_err']; ?></span>
</div>
<div class="form-group">
    <label for="name">Country: <sup>*</sup></label>
    <input id="country" type="text" name="country" class="form-control form-control <?php echo (!empty($data['country_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['country']; ?>">
    <span class="invalid-feedback"><?php echo $data['country_err']; ?></span>
</div>

