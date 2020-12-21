<?php

function get_metadata_value($array,$key){
    foreach ($array as $row) {
        if($row['metadata_key']==$key) return $row['value'];
    }
}

function get_metadata_value_id($array,$key){
    foreach ($array as $row) {
        if($row['metadata_key']==$key) return $row['id'];
    }
}

function get_first_char_each_word($data) {
    $arr = explode(' ',trim($data));
    $acronym = "";

    foreach ($arr as $w) {
        $acronym .= $w[0];
    }
    return $acronym;
}