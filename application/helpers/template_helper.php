<?php

// Untuk Alasan performa templating disini
function get_template($view) {
    $_this =& get_instance();

    return $_this->load->view($view);
}

// Judul Dinamis untuk setiap halaman
function title() {
    $_this =& get_instance();
    
    $page = $_this->uri->segment(1);
    $title = array(
    	'dashboard' => 'Dashboard',
    	'stock' => 'Stock',
    	'receiving' => 'Receiving / In',
    	'issuing' => 'Issuing / Out',
    	'recap' => 'Recap',
    	'user' => 'User',
        'category' => 'Category'
    );

    if(array_key_exists($page, $title)) {
    	return $title[$page];
    }
}

?>