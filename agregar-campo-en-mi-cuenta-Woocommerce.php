<?php
//Se agrega campo en el formulario de mi cuenta
function get_user_meta_wp( $user_id, $key = '', $single = false ) {
    return get_metadata( 'user', $user_id, $key, $single );
}

add_action( 'woocommerce_edit_account_form', 'ayudawp_nuevo_campo_num_tarjeta_woo' );
function ayudawp_nuevo_campo_num_tarjeta_woo(){
	$numTarjeta = get_user_meta_wp(get_current_user_id(),'num_tarjeta');
    woocommerce_form_field(
        'num_tarjeta',
        array(
            'type' 			=> 'number',
            //'required' 		=> true, // esto añade un asterisco
            'label' 		=> 'Número de tarjeta del Club',
            'placeholder' 	=> 'Si sos socio'
        ),
        ( isset($numTarjeta[0]) ? $numTarjeta[0] : '' )
    );
	
	
}
//Añadimos el campo a la base de datos
add_action( 'woocommerce_save_account_details', 'ayudawp_guardar_campos_num_tarjeta' );
function ayudawp_guardar_campos_num_tarjeta( $customer_id ){
    if ( isset( $_POST['num_tarjeta'] ) ) {
        update_user_meta( $customer_id, 'num_tarjeta', wc_clean( $_POST['num_tarjeta'] ) );
    }
	
}
