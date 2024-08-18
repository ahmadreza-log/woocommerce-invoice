<?php
defined( 'ABSPATH' ) || exit;

$page = $_GET[ 'page' ] ?? 'list';
$page = str_replace( 'woocommerce-invoice', '', $page );
$page = str_replace( '-', '', $page );
$page = $page !== '' ? $page : 'list';

$wrapper_classes   = [ 'wrap', 'woocommerce-invoice-wrap' ];
$wrapper_classes[] = 'woocommerce-invoice-' . $page . '-wrap';
$wrapper_classes   = apply_filters( 'woocommerce_invoice_admin_wrapper_classes', $wrapper_classes );
$wrapper_classes   = implode( ' ', $wrapper_classes );

?>

<div class="<?php echo $wrapper_classes; ?>">
    <div class="container">
		<?php require_once WC_INVOICE_PLUGIN_DIR . 'includes/admin/views/templates/' . $page . '.php'; ?>
    </div>
</div>