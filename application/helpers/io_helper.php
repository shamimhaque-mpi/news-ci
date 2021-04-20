<?php

// Save Data In The Table
if (!function_exists('save')) {
    function save($table, $data=[]){
        $ci =& get_instance();
        if (!empty($table) && !empty($data)) {
            $ci->db->insert($table, $data);
            return $ci->db->insert_id();
        }
        return false;
    }
}
// Save Data In The Table
if (!function_exists('update')) {
    function update($table, $data=[], $where){
        $ci =& get_instance();
        if (!empty($table) && !empty($data)) {
            $ci->db->where($where);
            $ci->db->update($table, $data);
            return true;
        }
        return false;
    }
}

// Read Sigle Table
if (!function_exists('readTable')) {
    function readTable($table, $where=[], $nidle=[]){
        $ci =& get_instance();
        if (isset($nidle['select'])) {
            $ci->db->select($nidle['select']);
        }
        // get group by
        if (isset($nidle['groupBy'])) {
            $ci->db->group_by($nidle['groupBy']);
        }
        
        // get limit
        if (isset($nidle['limit']) && isset($nidle['offset'])) {
            $ci->db->limit($nidle['offset'], $nidle['limit']);
        } elseif (isset($nidle['limit'])) {
            $ci->db->limit($nidle['limit']);
        }  
        
        // OrderBy
        if(isset($nidle['orderBy'])){
            if(is_array($nidle['orderBy']) && count($nidle['orderBy'])==2){
                $ci->db->order_by($nidle['orderBy'][0], $nidle['orderBy'][1]);
            }else{
                $ci->db->order_by('id', $nidle['orderBy']);
            }
        }
        
        $query = $ci->db->where($where)->get($table);

        return $query->result();
        
    }
}

// Delete Data From Table
if (!function_exists('remove')) {
    function remove($table, $where=[]) {
        $ci =& get_instance();
        if (!empty($table) && !empty($where)) {
            $ci->db->where($where);
            $ci->db->delete($table);
            return true;
        }
        return false;
    }
}

// Crop word form sentence
if(!function_exists('crop')){
    function crop($strings=null, $length=8){
        if($strings)
        {
            $strings = strip_tags($strings);
            $words   = explode(' ', $strings);
            
            if(count($words)>$length){
                return implode(' ', array_slice($words, 0, $length)).'...';
            }
            return $strings;
        }
    }
}

// Date distance
if(!function_exists('dateDistance')){
    function dateDistance($date=null, $current=null, $day_limit=7){
        if(!$current) $current = date('Y-m-d H:i:s');
        if($date){
            $current_stamp = strtotime($current);
            $posted_stamp  = strtotime($date);
            
            $second = ($current_stamp - $posted_stamp);
            $d = floor($second/(3600*24));
            $h = floor($second/3600);
            $m = floor(($second / 60) % 60);
            $i = ($second % 60);
            
            $time = ($h > 0 ? "{$h} h " : "").($m > 0 ? " : {$m} m" : "");
            
            if($d > 0 && $d < $day_limit){
                return $d." day ago";
            }
            else if($d > $day_limit){
                return date('Y-m-d', $posted_stamp);
            }
            else{
                return $time." ago";
            }
        }
    }
}

