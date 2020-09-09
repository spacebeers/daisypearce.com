<?php
    /**
     * Block Name: Seperator
     */

     $flair_direction = get_field('direction');
?>

<div class="flair flair-<?php echo $flair_direction; ?>">
    <?php echo file_get_contents(get_template_directory() . '/assets/flair.svg', true); ?>
    <hr />
</div>