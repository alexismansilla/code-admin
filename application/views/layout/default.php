<?php echo doctype('html5'); ?>
<html>
    <head>
        <?php echo meta($meta); ?>
        <title><?php echo $title_for_layout; ?></title>
        <?php echo $style_for_layout; ?>
        <?php echo $script_for_layout; ?>
        <?php echo $Layout->element('header_scripts'); ?>
    </head>

    <body>
        <?php echo $Layout->element('navbar'); ?>
        <div class="container">
            <?php echo $contents_for_layout; ?>
        </div>
        <?php echo $Layout->element('footer_scripts'); ?>
    </body>

</html>
