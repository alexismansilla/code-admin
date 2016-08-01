<?php echo form_open('cities/save', 'role="form"'); ?>
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="name">Descripción</label>
    <textarea class="form-control" rows="3" id="description" name="description"></textarea>
  </div>
  <select class="form-control" name="country">
    <?php foreach($countries as $country): ?>
      <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
    <?php endforeach; ?>
  </select>
  <div class="form-group">
    <label for="name">Prioridad</label>
    <input type="text" class="form-control" id="priority" name="priority">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" id="visibility" name="visibility" value="1"> Visible
    </label>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" id="coming_soon" name="coming_soon" value="1"> Próximamente
    </label>
  </div>
  <input type="submit" class="btn btn-primary" value="Submit">
  <button type="button" onclick="location.href='<?php echo base_url('cities/index') ?>'" class="btn btn-success">Back</button>
</form>
<?php echo form_close(); ?>
