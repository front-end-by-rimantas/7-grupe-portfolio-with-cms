<?php

function renderServices( $data ) {
    $HTML = '';

    if ( gettype($data) !== 'array' ) {
        return $HTML;
    }

    for ( $i=0; $i<sizeof($data); $i++ ) {
        if ( $data[$i]['status'] !== 1 ) {
            continue;
        }
        $HTML .= '<div class="service">
                    <i class="fa fa-'. $data[$i]['icon'] .'"></i>
                    <h3>'. $data[$i]['title'] .'</h3>
                    <p>'. $data[$i]['description'] .'</p>
                </div>';
    }

    return $HTML;
}

?>