<?php echo form_open('countries/update', 'role="form"'); ?>
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" id="visibility" name="visibility" value="<?php echo $visibility; ?>" <?php echo ($visibility == 1 ? 'checked' : ''); ?>> Visible
    </label>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" id="active" name="active" value="<?php echo $active; ?>" <?php echo ($active == 1 ? 'checked' : ''); ?>> Activo
    </label>
  </div>
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <input type="submit" class="btn btn-primary" value="Update">
  <button type="button" onclick="location.href='<?php echo base_url('countries/index') ?>'" class="btn btn-success">Back</button>
</form>
<?php echo form_close(); ?>
