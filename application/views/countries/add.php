<?php echo form_open('countries/save', 'role="form"'); ?>
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" id="visibility" name="visibility" value="1"> Visible
    </label>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" id="active" name="active" value="1"> Activo
    </label>
  </div>
  <input type="submit" class="btn btn-primary" value="Submit">
  <button type="button" onclick="location.href='<?php echo base_url('countries/index') ?>'" class="btn btn-success">Back</button>
</form>
<?php echo form_close(); ?>
