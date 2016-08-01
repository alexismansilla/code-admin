<a href="<?php echo base_url('cities/add') ?>" class="btn btn-primary">Nueva Ciudad</a>

<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <td>Nº</td>
        <td>Pais</td>
        <td>Nombre</td>
        <td>Descripción</td>
        <td>Prioridad</td>
        <td>Opciones</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cities as $index => $city): ?>
        <tr>
          <td><?php echo $index + 1; ?></td>
          <td><?php echo $city->country; ?></td>
          <td><?php echo $city->name; ?></td>
          <td><?php echo $city->description; ?></td>
          <td><?php echo $city->priority; ?></td>
          <td>
          	<?php if($city->visibility == 1): ?>
              <a href="<?php echo base_url('cities/visibility/'.$city->id.'/0'); ?>" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
            <?php else: ?>
              <a href="<?php echo base_url('cities/visibility/'.$city->id.'/1'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
            <?php endif; ?>
          	<?php if($city->coming_soon == 1): ?>
              <a href="<?php echo base_url('cities/coming_soon/'.$city->id.'/0'); ?>" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
            <?php else: ?>
              <a href="<?php echo base_url('cities/coming_soon/'.$city->id.'/1'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
            <?php endif; ?>
            <!-- Edit -->
            <a href="<?php echo base_url('cities/edit/'.$city->id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <!-- Remove -->
            <a href="<?php echo base_url('cities/remove/'.$city->id); ?>" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
