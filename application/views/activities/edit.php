<?php echo form_open('activities/update', 'role="form"'); ?>
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <div class="form-group">
    <label for="title">Titulo</label>
    <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
  </div>
   <div class="form-group">
    <label for="name">Subtitulo</label>
    <textarea class="form-control" row="3" id="subtitle" name="subtitle"><?php echo $subtitle; ?></textarea>
  </div>
   <div class="form-group">
    <label for="name">Descripcion</label>
    <textarea class="form-control" row="3" id="description" name="description"><?php echo $description; ?></textarea>
  </div>
  <div class="form-group">
    <label for="name">Fecha de Inicio</label>
    <input type="text" class="form-control" id="date_start" name="date_start" value="<?php echo $date_start; ?>">
  </div>
  <div class="form-group">
    <label for="name">Fecha de Termino</label>
    <input type="text" class="form-control" id="date_end" name="date_end" value="<?php echo $date_end; ?>">
  </div>
  <div class="form-group">
    <label for="name">Prioridad</label>
    <input type="text" class="form-control" id="priority" name="priority" value="<?php echo $priority; ?>">
  </div>
  <div class="form-group">
    <label for="name">Duracion</label>
    <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $duration; ?>">
  </div>
  <div class="form-group">
    <label for="name">Link</label>
    <input type="text" class="form-control" id="link" name="link" value="<?php echo $link; ?>">
  </div>
  <input type="submit" class="btn btn-primary" value="Update">
  <button type="button" onclick="location.href='<?php echo base_url('activities/index') ?>'" class="btn btn-success">Back</button>
</form>
<?php echo form_close(); ?>
