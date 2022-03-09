<?php
//Añadimos los campos en una nueva sección
add_action( 'show_user_profile', 'agregar_campos_seccion' );
add_action( 'edit_user_profile', 'agregar_campos_seccion' );
 
function agregar_campos_seccion( $user ) {
?>
    <h3><?php _e('Datos de Suscripción'); ?></h3>
    
    <table class="form-table">
        <tr>
            <th>
                <label for="num_tarjeta"><?php _e('Número de tarjeta'); ?></label>
            </th>
            <td>
                <input type="number" name="num_tarjeta" id="num_tarjeta" class="regular-text"
                	value="<?php echo esc_attr( get_the_author_meta( 'num_tarjeta', $user->ID ) ); ?>" />
                <p class="description"><?php _e('Número de tarjeta del socio'); ?></p>
            </td>
        </tr>
    </table>
<?php }

//Guardamos los nuevos campos
add_action( 'personal_options_update', 'grabar_campos_seccion' );
add_action( 'edit_user_profile_update', 'grabar_campos_seccion' );

function grabar_campos_seccion( $user_id ) {
	
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }

    if( isset($_POST['num_tarjeta']) ) {
        $num_tarjeta = sanitize_text_field($_POST['num_tarjeta']);
        update_user_meta( $user_id, 'num_tarjeta', $num_tarjeta );
    }
}
