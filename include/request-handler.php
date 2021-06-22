<?php

function id_validator_request_handler(){
    $path_pattern = get_option("id_validator_url_path",null);
    if(is_null($path_pattern)){
        return;
    }
    if(preg_match($path_pattern,$_SERVER["REQUEST_URI"])){
	    get_header();
        $id = $_GET["ID"];
        if(!isset($id)){
            echo "<h1>No id has been provided</h1>";
            get_footer();
            exit();
        }
        require __dir__."/google-sheet-api.php";
        $sheet_id = get_option("id_validator_sheet_id");
        $api = new GoogleSheetAPI();
        $data = $api->fetch_sheet($sheet_id, $id);
        if(is_null($data)){
             echo "<h1>No data found</h1>";
         }else{
        $fields = $api->build_fields($data);
        $api->build_html($fields);
         }
         get_footer();
        exit();
    }
}

add_action('parse_request', 'id_validator_request_handler');
?>
