<div class="page-header">
  <h1>General</h1>
</div>
<div class="page-content">
  <?php echo form_open('activities/save', 'role="form"'); ?>
    <div class="form-group">
      <label for="title">Titulo</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
      <label for="subtitle">Subtitulo</label>
      <textarea class="form-control" rows="3" id="subtitle" name="subtitle"></textarea>
    </div>
    <div class="form-group">
      <label for="description">Descripcion</label>
      <textarea class="form-control" rows="3" id="description" name="description"></textarea>
    </div>
    <div class="form-group">
      <label for="date-start">Fecha de inicio</label>
      <input type class="form-control" id="date-start" name="date-start">
    </div>
    <div class="form-group">
      <label for="date-end">Fecha de termino</label>
      <input type class="form-control" id="date-end" name="date-end">
    </div>
    <div class="form-group">
      <label for="priority">Prioridad</label>
      <input type class="form-control" id="priority" name="priority">
    </div>
    <div class="form-group">
      <label for="duration">Duracion</label>
      <input type class="form-control" id="duration" name="duration">
    </div>
    <div class="form-group">
      <label for="link">Link</label>
      <input type class="form-control" id="link" name="link">
    </div>
    <label>Ciudad</label>
    <select class="form-control" name="city_id">
      <?php foreach($cities as $city): ?>
        <option value="<?php echo $city->id; ?>"><?php echo $city->name; ?></option>
      <?php endforeach; ?>
    </select>
    <div class="page-header">
      <h1>Precios</h1>
    </div>
    <div class="form-group">
      <label for="price_total">Precio total</label>
      <input type class="form-control" id="price_total" name="price_total">
    </div>
    <div class="form-group">
      <label for="price_person">Precio por Persona</label>
      <input type class="form-control" id="price_person" name="price_person">
    </div>
    <div class="form-group">
      <label for="price_balance">Precio Balance</label>
      <input type class="form-control" id="price_balance" name="price_balance">
    </div>
    <div class="page-header">
      <h1>Articulos</h1>
    </div>
      <select id="example-getting-started" class="multiselect" name="article[]" multiple="multiple" style="display: none;">
        <?php foreach($articles as  $article): ?>
          <option value="<?php echo $article->id; ?>"><?php echo $article->title; ?></option>
        <?php endforeach; ?>
      </select>
    <hr>
    <input type="submit" class="btn btn-primary" value="Submit">
    <button type="button" onclick="location.href='<?php echo base_url('activities/index') ?>'" class="btn btn-success">Back</button>
  <?php echo form_close(); ?>
</div>
