"use strict";

if ( window.location.host === 'localhost' )  {
    var DOMAIN = 'http://localhost/portfolio';
} else {
    var DOMAIN = 'https://www.uxfix.lt';
}

var API = DOMAIN+'/api/index.php';

function getSectionInfo( section ) {
    if ( typeof(section) !== 'string' || section === '' ) {
        return;
    }

    var data = {
            api: 'section-info',
            section_name: section
        };
    
    // requestStart('loading...');

    $.post(API, data, function(callback) {
        if (callback.success === 'SUCCESS') {
            switch ( callback.take_action ) {
                case 'redirect':
                    window.location.href = callback.url;
                    break;
                default:
                    break;
            }
            // requestEnd( true, callback.msg );
        } else {
            // requestEnd( false, callback.msg );
        }
    }, "json");

    return;
}

function editItem() {
    return;
}