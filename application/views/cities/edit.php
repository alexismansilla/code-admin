<?php echo form_open('cities/update', 'role="form"'); ?>
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
  </div>
   <div class="form-group">
    <label for="name">Descripción</label>
    <textarea class="form-control" row="3" id="description" name="description"><?php echo $description; ?></textarea>
  </div>
  <select class="form-control" name="country_id" >
   <label for="sel1">Select list:</label>
  <?php foreach($countries as $country): ?>
    <?php if($country->id == $country_id): ?>
      <option selected="selected" value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
    <?php else: ?>
      <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
    <?php endif; ?>
  <?php endforeach; ?>
  </select>
  <div class="form-group">
    <label for="name">Prioridad</label>
    <input type="text" class="form-control" id="priority" name="priority" value="<?php echo $priority; ?>">
  </div> 
  <div class="checkbox">
    <label>
      <input type="checkbox" id="visibility" name="visibility" value="<?php echo $visibility; ?>" <?php echo ($visibility == 1 ? 'checked' : ''); ?>> Visible
    </label>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" id="coming_soon" name="coming_soon" value="<?php echo $coming_soon; ?>" <?php echo ($coming_soon == 1 ? 'checked' : ''); ?>> Próximamente
    </label>
  </div>       
  <input type="submit" class="btn btn-primary" value="Update">
  <button type="button" onclick="location.href='<?php echo base_url('cities/index') ?>'" class="btn btn-success">Back</button>
</form>
<?php echo form_close(); ?>
