<?php
if (! defined('ABSPATH') ) {
	exit; // Exit if accessed directly.
}
?>
<div class="svsfc-voting-results">
    <div class="svsfc-chart">
        <div class="svsfc-bar" style="width: <?php echo  esc_attr($data['yes'])  ?>;"><?php echo  esc_attr($data['yes'])  ?></div>
        <div class="svsfc-label"><?php echo esc_html__('Yes', 'svsfc-feedback'); ?></div>
    </div>

    <div class="svsfc-chart">
        <div class="svsfc-bar" style="width: <?php echo  esc_attr($data['no'])  ?>;"><?php echo  esc_attr($data['no'])  ?></div>
        <div class="svsfc-label"><?php echo esc_html__('No', 'svsfc-feedback'); ?></div>
    </div>
</div>
