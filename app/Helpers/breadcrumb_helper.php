<?php
if(!function_exists("breadcrumbs")){
    function breadcrumbs($uri){
        if(NULL !== $uri){
            return explode('/', $uri);
        }

        return [];
    }
}