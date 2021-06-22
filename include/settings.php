<?php
function id_validator_settings_init(){
    register_setting(
        "id_validator_settings_group",
        "id_validator_api_credentials",
        );

    register_setting(
        "id_validator_settings_group",
        "id_validator_sheet_id",
        );

    register_setting(
        "id_validator_settings_group",
        "id_validator_url_path"
        );

    register_setting(
        "id_validator_settings_group",
        "id_validator_sheet_id_notation",
        );

    register_setting(
        "id_validator_settings_group",
        "id_validator_sheet_column_notations",
        );

    add_settings_section(
        "id_validator_api",
        "API Settings",
        "id_validator_api_section_callback",
        "id_validator_settings_page",
    );

    add_settings_section(
        "id_validator_general",
        "General Settings",
        "id_validator_general_section_callback",
        "id_validator_settings_page",
    );


    add_settings_field(
        "id_validator_api_credentials",
        "API Credentials (in JSON format)",
        "id_validator_api_callback",
        "id_validator_settings_page",
        "id_validator_api",
        );

    add_settings_field(
        "id_validator_sheet_id",
        "Google sheet Id",
        "id_validator_sheet_id_callback",
        "id_validator_settings_page",
        "id_validator_api",
        );

    add_settings_field(
        "id_validator_url_path",
        "Url path for verification ",
        "id_validator_url_path_callback",
        "id_validator_settings_page",
        "id_validator_general",
        );

    add_settings_field(
        "id_validator_sheet_id_notation",
        "Notation of ID column (eg. A,B..)",
        "id_validator_sheet_id_notation_callback",
        "id_validator_settings_page",
        "id_validator_general",
        );

    add_settings_field(
        "id_validator_sheet_column_notations",
        "Field name and column notations (in JSON format)",
        "id_validator_sheet_column_notations_callback",
        "id_validator_settings_page",
        "id_validator_general",
        );

}

function id_validator_api_section_callback(){
    echo '';
}

function id_validator_general_section_callback(){
    echo '';
}
function id_validator_api_callback() {
    $setting = get_option('id_validator_api_credentials');
    ?>
    <input type="text" name="id_validator_api_credentials" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}

function id_validator_sheet_id_callback() {
    $setting = get_option('id_validator_sheet_id');
    ?>
    <input type="text" name="id_validator_sheet_id" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}

function id_validator_url_path_callback() {
    $setting = get_option('id_validator_url_path');
    ?>
    <input type="text" name="id_validator_url_path" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}

function id_validator_sheet_id_notation_callback() {
    $setting = get_option('id_validator_sheet_id_notation');
    ?>
    <input type="text" name="id_validator_sheet_id_notation" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}

function id_validator_sheet_column_notations_callback() {
    $setting = get_option('id_validator_sheet_column_notations');
    ?>
    <input type="text" name="id_validator_sheet_column_notations" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}





function id_validator_submenu(){
    add_submenu_page(
    "tools.php",
    "ID Validator",
    "ID Validator",
    "manage_options",
    "id_validator_settings",
    "id_validator_submenu_callback",
);
}

function id_validator_submenu_callback() {
    if (!current_user_can('manage_options')){
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('id_validator_settings_group');
            settings_fields('id_validator_settings_group');
            do_settings_sections('id_validator_settings_page');
            submit_button( __( 'Save Settings', 'textdomain' ) );
            ?>
        </form>
    </div>
    <?php
}
add_action("admin_init", "id_validator_settings_init");
add_action("admin_menu", "id_validator_submenu");
