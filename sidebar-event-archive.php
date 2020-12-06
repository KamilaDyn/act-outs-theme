<?php
if (!is_active_sidebar('sidebar-events')) {
    return;
}
?>
<?php $sidebar_layout = act_outs_get_option('layout_options');
if ('no-sidebar' !== $sidebar_layout) { ?>
    <aside id="secondary" class="widget-area" role="complementary">
        <?php dynamic_sidebar('sidebar-events'); ?>
    </aside><!-- #secondary -->
<?php } ?>