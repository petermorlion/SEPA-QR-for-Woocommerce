<?php

final class Settings {
    public static function init() {
        add_action('admin_init', array(__CLASS__, 'add_settings'));
    }

    public static function add_settings() {
        $page = 'muxp_settings';
        $gdpr_section = 'muxp_gdpr';
        add_settings_section(
            $gdpr_section,
            __('GDPR', 'SEPA-QR-for-Woocommerce'),
            array(__CLASS__, 'gdpr_settings_callback'),
            $page);

        register_setting($page, 'muxp_store_qr_code_as_image');
        add_settings_field(
            'muxp_store_qr_code_as_image', 
            __('Store QR code as image', 'SEPA-QR-for-Woocommerce'), 
            array(__CLASS__, 'store_qr_code_as_image_setting_html'),
            $page,
            $gdpr_section);

        $rendering_section = 'muxp_rendering';
        add_settings_section(
            $rendering_section,
            __('Layout', 'SEPA-QR-for-Woocommerce'),
            array(__CLASS__, 'rendering_settings_callback'),
            $page);

        register_setting($page, 'muxp_payment_request_text');
        add_settings_field(
            'muxp_payment_request_text', 
            __('Payment request text on confirmation page', 'SEPA-QR-for-Woocommerce'), 
            array(__CLASS__, 'payment_request_text_setting_html'), 
            $page, 
            $rendering_section);

        register_setting($page, 'muxp_payment_request_email_text');
        add_settings_field(
            'muxp_payment_request_email_text', 
            __('Payment request text in email', 'SEPA-QR-for-Woocommerce'), 
            array(__CLASS__, 'payment_request_email_text_setting_html'), 
            $page, 
            $rendering_section);

        register_setting($page, 'muxp_qr_max_width');
        add_settings_field(
            'muxp_qr_max_width', 
            __('Maximum width of the QR code (in pixels)', 'SEPA-QR-for-Woocommerce'), 
            array(__CLASS__, 'qr_max_width_setting_html'),
            $page, 
            $rendering_section);
    }

    public static function gdpr_settings_callback () {
    }

    public static function rendering_settings_callback () {
    }

    public static function store_qr_code_as_image_setting_html() {
	    $store_qr_code_as_image = get_option('muxp_store_qr_code_as_image', 'off');
?>
		<input type="checkbox" name="muxp_store_qr_code_as_image" <?php checked($store_qr_code_as_image, 'on', true); ?> />
        <p class="description">
            <?php esc_html_e("This will store the QR code as an image on your server instead of generating a transient base64 string. This has consequences for the GDPR compliance of your website and you should inform your customers as such.", 'SEPA-QR-for-Woocommerce') ?>
        </p>
    <?php
    }

    public static function payment_request_text_setting_html() {
	    $payment_request_text = get_option('muxp_payment_request_text', __('For a convenient payment scan this qr code!', 'SEPA-QR-for-Woocommerce'));
?>
		<textarea name="muxp_payment_request_text" rows="5" cols="50"><?php echo esc_textarea($payment_request_text); ?></textarea>
        <p class="description">
            <?php esc_html_e("This text will be displayed above the QR code on the Thank You page.", 'SEPA-QR-for-Woocommerce') ?>
        </p>
    <?php
    }

    public static function payment_request_email_text_setting_html() {
	    $payment_request_email_text = get_option('muxp_payment_request_email_text', __('For a convenient payment scan this qr code!', 'SEPA-QR-for-Woocommerce'));
?>
		<textarea name="muxp_payment_request_email_text" rows="5" cols="50"><?php echo esc_textarea($payment_request_email_text); ?></textarea>
        <p class="description">
            <?php esc_html_e("This text will be displayed above the QR code in the order confirmation mail.", 'SEPA-QR-for-Woocommerce') ?>
        </p>
    <?php
    }

    public static function qr_max_width_setting_html() {
	    $qr_max_width = get_option('muxp_qr_max_width', '200');
?>
		<input type="number" name="muxp_qr_max_width" value="<?php echo esc_attr($qr_max_width); ?>" />
		<p class="description">
			<?php esc_html_e("This will set the maximum width of the QR code in pixels. Default is 200.", 'SEPA-QR-for-Woocommerce') ?>
		</p>
	<?php
    }
}
