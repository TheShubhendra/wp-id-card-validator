<?php
function id_validator_settings_init(){
    register_setting(
        "id_validator_API",
        "id_validator_api_credentials"
        );

    register_setting(
        "id_validator_API",
        "id_validator_sheet_id"
        );

    register_setting(
        "id_validator_general",
        "id_validator_url_path"
        );

    register_setting(
        "id_validator_general",
        "id_validator_sheet_id_notation"
        );

    register_setting(
        "id_validator_general",
        "id_validator_sheet_column_notations"
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
        "id_validator_api"
        );

    add_settings_field(
        "id_validator_sheet_id",
        "Google sheet Id",
        "id_validator_sheet_id_callback",
        "id_validator_settings_page",
        "id_validator_api"
        );

    add_settings_field(
        "id_validator_url_path",
        "Url path for verification ",
        "id_validator_url_path_callback",
        "id_validator_settings_page",
        "id_validator_general"
        );

    add_settings_field(
        "id_validator_sheet_id_notation",
        "Notation of ID column (eg. A,B..)",
        "id_validator_sheet_id_notation_callback",
        "id_validator_settings_page",
        "id_validator_general"
        );

    add_settings_field(
        "id_validator_sheet_column_notations",
        "Field name and column notations (in JSON format)",
        "id_validator_sheet_column_notations_callback",
        "id_validator_settings_page",
        "id_validator_general"
        );

}
