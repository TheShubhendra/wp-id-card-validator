<?
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 
$options = array(
    "id_validator_api_credentials",
    "id_validator_sheet_id",
    "id_validator_url_path",
    "id_validator_sheet_id_notation",
    "id_validator_sheet_column_notations",
    );
 
 foreach($options as $option){
    delete_option($option);
 }
