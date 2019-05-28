<?php

function renderServices( $data ) {
    $HTML = '';

    if ( gettype($data) !== 'array' ) {
        return $HTML;
    }

    for ( $i=0; $i<sizeof($data); $i++ ) {
        $HTML .= '<div class="service">
                    <i class="fa fa-'. $data[$i]->icon .'"></i>
                    <h3>'. $data[$i]->title .'</h3>
                    <p>'. $data[$i]->p .'</p>
                </div>';
    }

    return $HTML;
}

?>