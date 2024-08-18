<?php

defined( 'ABSPATH' ) || exit;

$sections = [
	'general'          => __( 'General Options', 'woocommerce-invoice' ),
	'invoice-template' => __( 'Invoice Template', 'woocommerce-invoice' ),
	'tag-template'     => __( 'Tag Template', 'woocommerce-invoice' ),
	'customer-service' => __( 'Customer Service', 'woocommerce-invoice' ),
];

?>

<div class="sidebar">
    <div class="logo">
        <div class="icon">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path d="M34.8,-46.8C49.4,-37.3,68.4,-32.8,78.2,-21.1C88,-9.3,88.6,9.9,81.8,25.3C75,40.7,60.8,52.5,46,56.5C31.1,60.5,15.6,56.7,-1.5,58.7C-18.5,60.8,-37,68.6,-45.5,62.5C-53.9,56.4,-52.3,36.5,-53.2,20.4C-54.2,4.4,-57.6,-7.7,-56.4,-20.4C-55.1,-33.1,-49.2,-46.3,-39,-57.2C-28.8,-68.2,-14.4,-76.9,-2.1,-74C10.1,-71,20.2,-56.4,34.8,-46.8Z" transform="translate(100 100)"/>
            </svg>
            <span class="dashicons-woocommerce-invoice"></span>
        </div>
        <div class="info">
            <h1 class="font-mochiy-pop-one"><?php esc_html_e( 'Woocommerce Invoice', 'woocommerce-invoice' ); ?></h1>
            <span class="badge"><?php echo esc_html( WC_INVOICE_PLUGIN_VER ); ?></span>
        </div>
    </div>
    <div class="menu">
        <ul>
			<?php foreach ( $sections as $slug => $item ) {

				$classes   = [ 'sidebar-item', 'item-' . esc_attr( $slug ) ];
				$classes[] = $item == current( $sections ) ? 'active' : '';
				$classes   = implode( ' ', $classes );

				?>
                <li class="<?php echo esc_attr( $classes ); ?>">
                    <a href="#<?php echo esc_attr( $slug ); ?>">
						<?php echo esc_html( $item ); ?>
                    </a>
                </li>
			<?php } ?>
        </ul>
    </div>
</div>

<main class="sections">
	<?php foreach ( $sections as $slug => $item ) {

		$classes   = [ 'section-' . esc_attr( $slug ) ];
		$classes[] = $item == current( $sections ) ? 'active' : '';
		$classes   = implode( ' ', $classes );

		$file = WC_INVOICE_PLUGIN_ADMIN_DIR . 'options/' . $slug . '.php';

		?>
        <section id="<?php echo esc_attr( $slug ); ?>" class="<?php echo esc_attr( $classes ); ?>">
            <h1><?php echo esc_html( $item ); ?></h1>

			<?php if ( file_exists( $file ) ) {
				$options = require_once $file;
				if ( count( $options ) > 0 ) { ?>

                    <form novalidate method="post" enctype="multipart/form-data">
						<?php wp_nonce_field( 'wc-invoice-save' ) ?>
						<?php foreach ( $options as $option ) {
							$field_file = WC_INVOICE_PLUGIN_ADMIN_DIR . 'fields/' . $option[ 'type' ] . '.php';

							if ( isset( $option[ 'id' ] ) && $option[ 'id' ] !== '' ) {

								if ( file_exists( $field_file ) ) { ?>
                                    <div class="row form-row field-<?php echo esc_attr( $option[ 'type' ] ); ?>">
                                        <div class="field-wrapper field-<?php echo esc_attr( $option[ 'type' ] ); ?>-wrapper">

											<?php if ( isset( $option[ 'title' ] ) ) { ?>
                                                <label for="<?php echo esc_attr( $option[ 'id' ] ) ?>"><?php echo esc_html( $option[ 'title' ] ) ?></label>
											<?php } ?>

                                            <div>

												<?php require $field_file; ?>

												<?php if ( isset( $option[ 'desc' ] ) ) { ?>
                                                    <div class="field-desc">
														<?php echo $option[ 'desc' ]; ?>
                                                    </div>
												<?php } ?>

                                            </div>
                                        </div>
                                    </div>
								<?php } else { ?>
                                    <div class="row field-error">
										<?php printf( esc_html__( 'There is no field with type %s.', 'woocommerce-invoice' ), $option[ 'type' ] ); ?>
                                    </div>
								<?php }

							} else { ?>

                                <div class="row field-error">
									<?php esc_html_e( 'The `id` value is required.', 'woocommerce-invoice' ); ?>
                                </div>

							<?php }
						} ?>
						<?php submit_button(); ?>
                    </form>

				<?php }
			} ?>

        </section>
	<?php } ?>
</main>
