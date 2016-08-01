<a href="<?php echo base_url('countries/add') ?>" class="btn btn-primary">Nuevo Pais</a>

<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <td>Nº</td>
        <td>Nombre</td>
        <td>Opciones</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($countries as $index => $country): ?>
        <tr>
          <td><?php echo $index + 1; ?></td>
          <td><?php echo $country->name; ?></td>
          <td>
            <?php if($country->visibility == 1): ?>
              <a href="<?php echo base_url('countries/visibility/'.$country->id.'/0'); ?>" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
            <?php else: ?>
              <a href="<?php echo base_url('countries/visibility/'.$country->id.'/1'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
            <?php endif; ?>
            <?php if($country->active == 1): ?>
              <a href="<?php echo base_url('countries/active/'.$country->id.'/0'); ?>" class="btn btn-success btn-xs"><i class="fa fa-check" aria-hidden="true"></i></a>
            <?php else: ?>
              <a href="<?php echo base_url('countries/active/'.$country->id.'/1'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-times" aria-hidden="true"></i></a>
            <?php endif; ?>
            <!-- Edit -->
            <a href="<?php echo base_url('countries/edit/'.$country->id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <!-- Remove -->
            <a href="<?php echo base_url('countries/remove/'.$country->id); ?>" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>