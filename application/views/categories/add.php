<?php echo form_open('categories/save', 'role="form"'); ?>
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="name">Descripción</label>
    <textarea class="form-control" rows="3" id="description" name="description"></textarea>
  </div>
  <div class="form-group">
    <label for="name">Prioridad</label>
    <input type="text" class="form-control" id="priority" name="priority">
  </div>
  <input type="submit" class="btn btn-primary" value="Submit">
  <button type="button" onclick="location.href='<?php echo base_url('categories/index') ?>'" class="btn btn-success">Back</button>
</form>
<?php echo form_close(); ?>
