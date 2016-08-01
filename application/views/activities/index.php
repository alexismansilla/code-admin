<a href="<?php echo base_url('activities/add') ?>" class="btn btn-primary">Nueva Actividad</a>
<a href="<?php echo base_url('activities/pdf_generator') ?>" class="btn btn-warning">Generar pdf</a>

<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <td>Titulo</td>
        <td>Subtitulo</td>
        <td>Description</td>
        <td>Fecha Inicio</td>
        <td>Fecha Termino</td>
        <td>Prioridad</td>
        <td>Duracion</td>
        <td>Link</td>
        <td>Ciudad</td>
        <td>Opciones</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($activities as $index => $activity): ?>
        <tr>
          <td><?php echo $activity->title; ?></td>
          <td><?php echo $activity->subtitle; ?></td>
          <td><?php echo $activity->description; ?></td>
          <td><?php echo $activity->date_start; ?></td>
          <td><?php echo $activity->date_end; ?></td>
          <td><?php echo $activity->priority; ?></td>
          <td><?php echo $activity->duration; ?></td>
          <td><?php echo $activity->link; ?></td>
          <td><?php echo $activity->city; ?></td>
          <td>
            <!-- Edit -->           
            <a href="<?php echo base_url('activities/edit/'.$activity->id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <!-- Remove -->
            <a href="<?php echo base_url('activities/remove/'.$activity->id); ?>" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i></a>
            <!-- Star -->
            <?php if($activity->star == 1): ?>
              <a href="<?php echo base_url('activities/status_star/'.$activity->id.'/0'); ?>" class="btn btn-warning btn-xs"><i class="fa fa-star" aria-hidden="true"></i></a>
            <?php else: ?>              
              <a href="<?php echo base_url('activities/status_star/'.$activity->id.'/1'); ?>" class="btn btn-default btn-xs"><i class="fa fa-star" aria-hidden="true"></i></a>
            <?php endif; ?>
            <!-- Visibility -->
            <?php if($activity->visibility == 1): ?>
              <a href="<?php echo base_url('activities/visibility/'.$activity->id.'/0'); ?>" class="btn btn-warning btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
            <?php else: ?>
              <a href="<?php echo base_url('activities/visibility/'.$activity->id.'/1'); ?>" class="btn btn-default btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
            <?php endif; ?>
            <!-- Best Seller -->
            <?php if($activity->best_seller == 1): ?>
              <a href="<?php echo base_url('activities/best_seller/'.$activity->id.'/0'); ?>" class="btn btn-warning btn-xs"><i class="fa fa-tag" aria-hidden="true"></i></a>
            <?php else: ?>
              <a href="<?php echo base_url('activities/best_seller/'.$activity->id.'/1'); ?>" class="btn btn-default btn-xs"><i class="fa fa-tag" aria-hidden="true"></i></a>
            <?php endif; ?>
            <!-- Sale off -->
            <?php if($activity->sale_off == 1): ?>
              <a href="<?php echo base_url('activities/sale_off/'.$activity->id.'/0'); ?>" class="btn btn-warning btn-xs"><i class="fa fa-tag" aria-hidden="true"></i></a>
            <?php else: ?>
              <a href="<?php echo base_url('activities/sale_off/'.$activity->id.'/1'); ?>" class="btn btn-default btn-xs"><i class="fa fa-tag" aria-hidden="true"></i></a>
            <?php endif; ?>
            <!-- Season -->
            <?php if($activity->season == 1): ?>
              <a href="<?php echo base_url('activities/season/'.$activity->id.'/0'); ?>" class="btn btn-warning btn-xs"><i class="fa fa-calendar" aria-hidden="true"></i></a>
            <?php else: ?>
              <a href="<?php echo base_url('activities/season/'.$activity->id.'/1'); ?>" class="btn btn-default btn-xs"><i class="fa fa-calendar" aria-hidden="true"></i></a>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<div>
  <?php echo $this->pagination->create_links(); ?>
</div>

