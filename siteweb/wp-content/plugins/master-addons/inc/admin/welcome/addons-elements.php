<?php

namespace MasterAddons\Admin\Dashboard\Addons;

use MasterAddons\Master_Elementor_Addons;
use MasterAddons\Admin\Dashboard\Addons\Elements\JLTMA_Addon_Elements;
use MasterAddons\Inc\Helper\Master_Addons_Helper;
?>


<div class="jltma-master-addons-features-list">

	<div class="jltma-master-addons-dashboard-filter is-flex">
		<div class="jltma-filter-left">
			<h3><?php echo esc_html__('Master Addons Elements', JLTMA_TD); ?></h3>
			<p>
				<?php echo esc_html__('Enable/Disable all Elements once. Please make sure to click "Save Changes" button'); ?>
			</p>
		</div>

		<div class="jltma-filter-right">
			<button class="jltma-addons-enable-all">
				<?php echo esc_html__('Enable All', JLTMA_TD); ?>
			</button>
			<button class="jltma-addons-disable-all">
				<?php echo esc_html__('Disable All', JLTMA_TD); ?>
			</button>
		</div>
	</div><!-- /.master-addons-dashboard-filter -->

	<h3><?php echo esc_html__('Content Elements', JLTMA_TD); ?></h3>

	<div class="jltma-master-addons-features-container is-flex">
		<?php foreach (JLTMA_Addon_Elements::$jltma_elements['jltma-addons']['elements'] as $key => $widget) : ?>

			<div class="jltma-master-addons-dashboard-checkbox">
				<div class="jltma-master-addons-dashboard-checkbox-content">

					<div class="jltma-master-addons-features-ribbon">
						<?php if (!ma_el_fs()->can_use_premium_code() && isset($widget['is_pro']) && $widget['is_pro']) {
							echo '<span class="jltma-pro-ribbon">Pro</span>';
						} ?>
					</div>

					<div class="jltma-master-addons-content-inner">
						<div class="jltma-master-addons-features-title">
							<?php echo $widget['title']; ?>
						</div> <!-- jltma_master_addons-features-title -->

						<div class="jltma-addons-tooltip inline-block">
							<?php
							Master_Addons_Helper::jltma_admin_tooltip_info('Demo', $widget['demo_url'], 'eicon-device-desktop');
							Master_Addons_Helper::jltma_admin_tooltip_info('Documentation', $widget['docs_url'], 'eicon-info-circle-o');
							Master_Addons_Helper::jltma_admin_tooltip_info('Video Tutorial', $widget['tuts_url'], 'eicon-video-camera');
							?>
						</div>
					</div> <!-- .master-addons-content-inner -->

					<div class="jltma-master-addons_feature-switchbox">
						<label for="<?php echo esc_attr($widget['key']); ?>" class="switch switch-text switch-primary switch-pill
							<?php if (!ma_el_fs()->can_use_premium_code() && isset($widget['is_pro']) && $widget['is_pro']) {
								echo "ma-el-pro";
							} ?>">

							<?php if (ma_el_fs()->can_use_premium_code()) { ?>

								<input type="checkbox" id="<?php echo esc_attr($widget['key']); ?>" class="jltma-switch-input" name="<?php echo esc_attr($widget['key']); ?>" <?php checked(1, $this->jltma_get_element_settings[$widget['key']], true); ?>>

							<?php } else { ?>

								<input type="checkbox" id="<?php echo esc_attr($widget['key']); ?>" class="jltma-switch-input " name="<?php echo esc_attr($widget['key']); ?>" <?php
																																												if (!ma_el_fs()->can_use_premium_code() && isset($widget['is_pro']) && $widget['is_pro']) {
																																													checked(0, $this->jltma_get_element_settings[$widget['key']], false);
																																													echo "disabled";
																																												} else {
																																													checked(1, $this->jltma_get_element_settings[$widget['key']], true);
																																												}  ?> />

							<?php } ?>

							<span data-on="On" data-off="Off" class="jltma-switch-label"></span>
							<span class="jltma-switch-handle"></span>
						</label>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

</div> <!--  .master_addons_feature-->