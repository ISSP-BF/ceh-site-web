<?php
/*
 * Plugin Name:       Newsletter
 * Description:       Permet d'envoyer des mails aux abonnés d'information sur la plateforme
 * Version: 		  1.0.0
 * Author: 			  Hamadou DAO
 * Text Domain: 	  newsletter
 * Domain Path: 	  /options/languages
 * Author URI:        https://www.linkedin.com/in/hamadou-dao/
 * Copyright 2021-02  Weblizar (email : daohamadou@gmail.com, twitter : @weblizar)
 */
add_action('admin_menu', 'nl_admin_menu_pannel');
function nl_admin_menu_pannel() {

	$page = add_menu_page(NLS_PLUGIN_NAME, esc_html__('Newsletter', 'NLS_TEXT_DOMAIN'), 'manage_options','nl-liste', 'nl_list_subscribers', '
dashicons-arrow-right',39);

add_submenu_page(
    'nl-liste',               // parent slug
    'Send Email',                      // page title
    'Send Email',                      // menu title
    'manage_options',                   // capability
    'nl-send-mail-1',               // slug
    'nl_edit_e_mail_form' // callback
);
add_submenu_page(
    'nl-liste',               // parent slug
    'List email',                      // page title
    'List email',                      // menu title
    'manage_options',                   // capability
    'nl-list-email',               // slug
    'nl_list_email' // callback
);
add_submenu_page(
    'nl-liste',               // parent slug
    'List email',                      // page title
    'List email',                      // menu title
    'manage_options',                   // capability
    'show_new_letters',               // slug
    'show_new_letters' // callback
);

}

function ceh_new_letter_create_e_mail_database()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'newsletter';
    $charset_collate = $wpdb->get_charset_collate();

    /* If table not existe, we will create a new table */

    $col2 = $wpdb->get_var("SHOW TABLES LIKE '$table_name'");
    if (!$col2) {
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
	id int NOT NULL AUTO_INCREMENT,
	subject VARCHAR(255) NOT NULL,
	content TEXT NOT NULL,
	date timestamp,
	UNIQUE KEY id (id)
	)$charset_collate;";
    }
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function ceh_new_letter_create_subscribers_database()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'subscribers';
    $charset_collate = $wpdb->get_charset_collate();

    /* If table not existe, we will create a new table */

    $col2 = $wpdb->get_var("SHOW TABLES LIKE '$table_name'");
    if (!$col2) {
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
	id int NOT NULL AUTO_INCREMENT,
	f_name VARCHAR(255) NOT NULL,
	l_name VARCHAR(255) NOT NULL,
	terms VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	date timestamp,
	act_code VARCHAR(255) NOT NULL,
	deact_code VARCHAR(255) NOT NULL,
	flag int,
	UNIQUE KEY id (id)
	)$charset_collate;";
    }
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

register_activation_hook(__FILE__, 'ceh_new_letter_create_subscribers_database');
register_activation_hook(__FILE__, 'ceh_new_letter_create_e_mail_database');

function verif_if_email_is_valid()
{
    if (isset($_GET['act_code'])) {
        $act_code = $_GET['act_code'];
        $email = $_GET['email'];
        //search & match the email & activation code
        global $wpdb;
        $table_name = $wpdb->prefix . 'subscribers';
        $user_search_result = $wpdb->get_row("SELECT * FROM `$table_name` WHERE `email` LIKE '$email' AND `act_code` LIKE '$act_code'");
        if (count($user_search_result)) {
            // check user is already subscribed
            if ($user_search_result->flag == 1) {
                get_header();
                echo '<div class="main_div1"><p class="subscribe-messages1">This email is already confirm <span class="close_message1">'.esc_html__('X', 'NLS_TEXT_DOMAIN').'</span></p></div>';
            } else {
                // update user subscription active
                if ($wpdb->query("UPDATE `$table_name` SET `flag` = '1' WHERE `email` = '$email'")) {
                    get_header();
                    echo '<div class="main_div1"><p class="subscribe-messages1">Subscribe is successed<span class="close_message1">'.esc_html__('X', 'NLS_TEXT_DOMAIN').'</span></p></div>';
                }
                // Send confirmation E-mail to client
                //require_once('options/themes/form-include/confirmation-mail-from.php');
            }
        } else {
            get_header();
            echo '<div class="main_div1"><p class="subscribe-messages1"> subscribe form is invalid confirmation message <span class="close_message1">'.esc_html__('X', 'NLS_TEXT_DOMAIN').'</span></p></div>';
        }
    }
}
add_action('template_redirect', 'verif_if_email_is_valid');

add_shortcode( 'nl_form_save', 'nl_form_save' );

function nl_form_save() { ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<form method="post" action="" class="subscriber-form col-lg-12" name="subscriber-form">
    <?php $nonce = wp_create_nonce('add_subscribers'); ?>
    <input type="hidden" name="add_subscribers" value="<?php echo esc_attr($nonce); ?>">
    <div class="form-group" data-sr="enter bottom over 1s and move 110px wait 0.5s">
        <div id="error_email2" class="validation_error error_email"></div>
        <input type="text" name="f_name" id="f_sub_name" class="form-control subscribe-input-layouts"
            placeholder="Prénom(s)" required='required'>
        <input type="text" name="l_name" id="l_sub_name" class="form-control subscribe-input-layouts"
            placeholder="Nom" required='required'>
        <input type="email" name="subscribe_email" id="edmm-sub-email1" class="form-control subscribe-input-layout2"
            placeholder="E-mail">
        <br>
        <div class="form-group-button">
            <button name="submit_subscriber" id="submit" class="subscriber_submit btn" id="submit" type="submit">
                Souscrire </button>
        </div>
    </div>
</form>


<?php
add_subscribers();
}

function nl_edit_e_mail_form(){

    ?>
<div class='wrap'>
    <h2><?php _e( 'Envoie NewsLetter' ); ?></h2>
    <form method='post'>
    <?php $nonce = wp_create_nonce('add_news_letter'); ?>
    <input type="hidden" name="add_news_letter" value="<?php echo esc_attr($nonce); ?>">
        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <td class="first"><label for="subject"><?php _e( 'Objet' ); ?></label></td>
                    <td><input type="text" name="subject" size="50" value="" id="subject" class="input-text-wrap" required /></td>
                </tr>
                <tr>
                    <td  colspan="2">
                    <label for="nl_content"><?php _e( 'Message' ); ?></label><p></p>
                        <?php
                        $arg =array(
                            'textarea_name' => 'nl_content',
                            'media_buttons' => true,
                            'quicktags' => true,
                            'wpautop' => false,
                            'teeny' => true,
                        "required"=>true); 
                            wp_nonce_field('nates_nonce_action', 'nates_nonce_field');
                
                            $content = get_option('nl_content');
                            wp_editor( $content, 'nl_content',$arg );?>
                    </td>
                </tr>
                <tr>
                <td colspan="2">
                    <label for="addFile"><?php _e('Joindre un fichier');?></label>
                    <input type="file" name="chaticon" id="addFile" value="" class="file-upload" /><br />
                    <button type="button" id="insert-media-button" class="button insert-media add_media" data-editor="addFile"><span class="wp-media-buttons-icon"></span> Joindre un fichier</button>
                </td>
                </tr>
            </tbody>
        </table>
        <?php submit_button('Envoyer', 'primary');?>
    </form>

    <?php add_news_letter();?>
</div><!-- .wrap -->
<?php
    
    
}

function nl_list_subscribers(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'subscribers';
    $requete = "SELECT `id`, `f_name`, `l_name`, `email`, `date` FROM $table_name";
    $resultat = $wpdb->get_results( $requete );
    $erreur_sql = $wpdb->last_error;
    ?>
    <div class='container'>
    <div class='wrap'>
    <h1 class="wp-heading-inline">La liste des abonnés</h1>
    <hr class="wp-header-end">
    <br>
    <br>
    <?php
    if ( $erreur_sql == "" ) {
        if ( $wpdb->num_rows > 0 ) {
        ?>
            <table class="widefat table table-striped">
            <thead>
                <tr>
                    <th scope="col">Prénom(s)</th>
                    <th scope="col">Nom</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach( $resultat as $lg ) {
                        echo "<tr>";
                        echo "<td>$lg->f_name</td>";
                        echo "<td>$lg->l_name</td>";
                        echo "<td>$lg->email</td>";
                        echo "<td>$lg->date</td>";
                        echo "</tr>";
                    } 
                ?>
            </tbody>
            </table>
        <?php
        } else {
            echo '<div class="notice notice-warning"><p>';
            _e( "Aucune donnée ne correspond aux critères demandés.", "mon-domaine-de-localisation" );
            echo '</p></div>';
        }
    } else {
        echo '<div class="notice notice-error"><p>';
        _e( "Oups ! Un problème a été rencontré.", "mon-domaine-de-localisation" );
        echo '</p></div>';
        monprefixe_log_debug( $erreur_sql );
    } 
    echo "</div>"; 
    echo "</div>"; 
}

function nl_list_email(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'newsletter';
    $requete = "SELECT `id`, `subject`, `date` FROM $table_name";
    $resultat = $wpdb->get_results( $requete );
    $erreur_sql = $wpdb->last_error;
    ?>
    <div class='container'>
    <div class='wrap'>
    <h1 class="wp-heading-inline">La liste des newsletters</h1>
    <hr class="wp-header-end">
    <br>
    <br>
    <?php
    if ( $erreur_sql == "" ) {
        if ( $wpdb->num_rows > 0 ) {
        ?>
            <table class="widefat table table-striped">
            <thead>
                <tr>
                    <th scope="col">Objet</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach( $resultat as $lg ) {
                        echo "<tr>";
                        echo "<td>$lg->subject</td>";
                        echo "<td>$lg->date</td>";
                ?>
                        <td><a href="admin.php?page=show_new_letters&&id=<?php echo $lg->id;?>" class="page-title-action">Afficher</a>
                        </td>
                        <?php
                        echo "</tr>";
                    } 
                ?>
            </tbody>
            </table>
            
        <?php
        } else {
            echo '<div class="notice notice-warning"><p>';
            _e( "Aucune donnée ne correspond aux critères demandés.", "mon-domaine-de-localisation" );
            echo '</p></div>';
        }
    } else {
        echo '<div class="notice notice-error"><p>';
        _e( "Oups ! Un problème a été rencontré.", "mon-domaine-de-localisation" );
        echo '</p></div>';
        monprefixe_log_debug( $erreur_sql );
    } 
    echo "</div>"; 
    echo "</div>"; 
}

function add_subscribers(){
    
    if(isset($_POST['add_subscribers'])){

    global $wpdb;
    $table_name = $wpdb->prefix . 'subscribers';
    
    $current_time = current_time( 'Y-m-d h:i:s' );
    $recived_email = sanitize_email($_POST['subscribe_email']);	
    $f_name = sanitize_text_field($_POST['f_name']);
	$l_name = sanitize_text_field($_POST['l_name']);
    $col2 = $wpdb->get_var("SELECT id FROM $table_name WHERE email like '$recived_email'");

    if ($col2):
        echo '<script>
   
        toastr.error("Vous avez déjà été abonné");
 
        </script>';
    else:
    $query= $wpdb->insert( $table_name, array( 'email' => $recived_email ,'f_name' => $f_name ,'l_name' => $l_name ,'date' => $current_time, 'flag' => 1 ) );
    echo '<script>
   
          toastr.success("Vous êtes maintenant abonné ");
   
    </script>';
    endif;
    }
}
require_once('mail_sender.php');
function sendMail($subject,$message){
    global $wpdb;
    $table_name = $wpdb->prefix . 'subscribers';
    $requete = "SELECT `id`, `f_name`, `l_name`, `email`, `date` FROM $table_name";
    $resultat = $wpdb->get_results( $requete );
    $erreur_sql = $wpdb->last_error;
    if ( $erreur_sql == "" ) {
        if ( $wpdb->num_rows > 0 ) {
            foreach( $resultat as $lg ) {
                sendMailNewLetter($lg->email,$lg->f_name,$lg->l_name,$subject,$message); 
            }
        }
    }
}

function add_news_letter(){
    
    if(isset($_POST['add_news_letter'])){
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script><?php
    global $wpdb;
    $table_name = $wpdb->prefix . 'newsletter';
    $current_time = current_time( 'Y-m-d h:i:s' );
    $subject = sanitize_text_field($_POST['subject']);
	$content = $_POST['nl_content'];

    $query= $wpdb->insert( $table_name, array( 'subject' => $subject ,'content' => $content ,'date' => $current_time ) );
    echo '<script>
          toastr.success("La newsletter a été enregistré");
    </script>';
        $erreur_sql = $wpdb->last_error;
        if($erreur_sql == '')
        {
            sendMail($subject,$content);
        }
    }
}

function save_nates_awesome_menu_page(){
    // check the nonce, update the option etc...
    

    if( isset($_POST['nates_nonce_field']) && 
        check_admin_referer('nates_nonce_action', 'nates_nonce_field')){
  
     if(isset($_POST['special_content'])){
       update_option('special_content', $_POST['special_content']);
     }
    }
}


function r_content( $content ) {
    $new_content = str_replace('\\','',$content);
    return ($new_content);
}

add_filter( 'the_content', 'r_content', 1 );

function show_new_letters(){
    if(isset($_GET['id'])):
        $id = $_GET['id'];
        global $wpdb;
        $table_name = $wpdb->prefix . 'newsletter';
        $requete = "SELECT `id`, `subject`, `content`, `date` FROM $table_name WHERE id=$id";
        $resultat = $wpdb->get_results( $requete );
        $erreur_sql = $wpdb->last_error;
        foreach( $resultat as $lg ) {
            echo "<label>$lg->subject</label>";
            echo "<p>".r_content($lg->content)."</p>";
            echo "<label>$lg->date</label>";
            $arg =array(
                'textarea_name' => 'nl_content',
                'media_buttons' => true,
                'quicktags' => true,
                'wpautop' => false,
                'teeny' => true,
            "required"=>true); 
                wp_editor( r_content($lg->content), 'nl_content',$arg );
        }
        
    endif;

}