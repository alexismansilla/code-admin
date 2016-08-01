<a href="<?php echo base_url('categories/add') ?>" class="btn btn-primary">Nueva Categoria</a>

<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <td>Nº</td>
        <td>Nombre</td>
        <td>Descripción</td>
        <td>Prioridad</td>
        <td>Opciones</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($categories as $index => $category): ?>
        <tr>
          <td><?php echo $index + 1; ?></td>
          <td><?php echo $category->name; ?></td>
          <td><?php echo $category->description; ?></td>
          <td><?php echo $category->priority; ?></td>
           <td>
             <!-- Edit -->
            <a href="<?php echo base_url('categories/edit/'.$category->id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <!-- Remove -->
            <a href="<?php echo base_url('categories/remove/'.$category->id); ?>" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
