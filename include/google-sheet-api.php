<?php

require_once "vendor/autoload.php";
class GoogleSheetAPI{
    public $client;
    public $service;
    function __construct(){
        $credentials = get_option("id_validator_api_credentials");
        $this->client = new Google_Client();
        $this->client->setApplicationName('YAIF ID Validator');
        $this->client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $this->client->setAccessType('offline');
        $this->client->setAuthConfig(json_decode($credentials,true));
        $this->service = new Google_Service_Sheets($this->client);
    }
    
    function fetch_sheet($spreadsheetId, $id){
        $id_column = get_option("id_validator_sheet_id_notation","A");
	$response = $this->service->spreadsheets_values->get($spreadsheetId, "A:A");
        $values = $response->getValues();
        if(!in_array(array($id), $values)){
                return null;
            }
        $row = array_search(array($id), $values)+1;
        $response = $this->service->spreadsheets_values->get($spreadsheetId, $row.":".$row);
        $data_row = $response->getValues();
        return $data_row[0];
    }
    
    function build_fields($data_row){
        $fields = get_option("id_validator_sheet_column_notations","{}");
        $fields_array = json_decode($fields, true);
        $data_array = array();
        foreach ($fields_array as $name => $notation){
            $data_array[$name] = $data_row[ord($notation) - 65];
        }
        
        return $data_array;
    }
    
    function build_html($data_array){
        echo '<div class="id-validator-info"><table>';
        foreach ($data_array as $name => $value){
            ?>
                <tr>
                    <td><?php echo $name ?></td>
                    <td><?php echo $value ?></td>
                </tr>
            <?php
	}
	echo '</table></div>';
    }
}

?>
