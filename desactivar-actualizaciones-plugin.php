<?php

//Se debe añadir a la parte final del archivo wp-includes/functions.php

function disable_plugin_updates( $value ) {
    //Aquí simplemente se han puesto ejemplos de plugins para saber cómo se usa
    unset( $value->response['code-snippets/code-snippets.php'] );
    unset( $value->response['pmpro-register-helper/pmpro-register-helper.php'] );
    unset( $value->response['paid-memberships-pro/paid-memberships-pro.php'] );
    unset( $value->response['gutenberg/gutenberg.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );
