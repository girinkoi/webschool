<?php

    function get_feature(){
        global $db;
        $get = $db->get('`fitur`');
        return $get;
    }
    function get_feature_by_id($id, $column) {
        global $db;
        $db->where ("id", $id);
        $get = $db->getOne ("`fitur`");
        return $get[$column];
    }
?>
