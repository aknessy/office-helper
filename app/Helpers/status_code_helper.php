<?php
if(!function_exists('status_code_string')){
    function status_code_string($status_code){
        return STATUS_CODES_INTERNAL[$status_code];
    }
}