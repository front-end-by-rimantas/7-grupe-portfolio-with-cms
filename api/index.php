<?php

include '../db-connect.php';

$response = (object)[
    'success' => 'FAIL',
    'msg' => 'API not found'
];

// lookup POST data and choose the right API
if ( sizeof($_POST) > 0 && gettype($_POST['api']) === 'string' ) {
    switch ( $_POST['api'] ) {
        /*********************************************************************
         * PUBLIC ACCESS
         *********************************************************************/

        case 'login':
            $response = $USER->login();
            break;

        case 'log_out':
            $response = $USER->logout();
            break;

        // case 'user_cookie_agree':
        //     $response = $USER->userCookieAgree();
        //     break;

        /*********************************************************************
         * ONLY LOGGED IN USER CAN ACCESS
         *********************************************************************/

        case 'section-info':
            // if ( in_array( $user_role, $SYSTEM_ROLES, true ) ) {
            //     $response = $DB->getSectionInfo($_POST['section_name']);
            // }
            $response = (object)[
                'success' => 'SUCCESS',
                'response' => $DB->getSectionInfo($_POST['section_name']),
                'form' => (object)[
                    '_order' => ['status', 'icon', 'title', 'description'],
                    'description' => 'textarea',
                    'icon' => 'icon-picker',
                    'status' => 'status-selector',
                    'title' => 'input'
                ]
            ];
            break;

        default:
            break;
    }
} else {
    return (object)[
        'success' => 'FAIL',
        'msg' => 'Wrong data format.'
    ];
}

echo json_encode($response);

?>