<?php echo form_open('categories/update', 'role="form"'); ?>
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
  </div>
  <div class="form-group">
    <label for="name">Descripcion</label>
    <input type="text" class="form-control" id="description" name="description" value="<?php echo $description; ?>">
  </div>
  <div class="form-group">
    <label for="name">Prioridad</label>
    <input type="text" class="form-control" id="priority" name="priority" value="<?php echo $priority; ?>">
  </div>
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <input type="submit" class="btn btn-primary" value="Update">
  <button type="button" onclick="location.href='<?php echo base_url('countries/index') ?>'" class="btn btn-success">Back</button>
</form>
<?php echo form_close(); ?>
