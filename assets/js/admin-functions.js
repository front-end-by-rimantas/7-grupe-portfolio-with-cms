"use strict";

// cia saugoma informacija apie visa projekta, kuria gauname per API is serverio
var DATA = {
    services: {}
};

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
            DATA[section] = callback;
            renderEditorList( section, callback.response )
            // requestEnd( true, callback.msg );
        } else {
            // requestEnd( false, callback.msg );
        }
    }, "json");

    return;
}

function editItem( section, index=null ) {
    var element_data = {},
        form_structure = DATA[section].form;

    if ( typeof(index) === 'number' ) {
        element_data = DATA[section].response[index];
    }
    console.log( index );
    console.log( form_structure );
    console.log( element_data );
    
    return;
}

function renderEditorList( section, data ) {
    var HTML = '<div class="list">';
    console.log(data);
    
    for ( var i=0; i<data.length; i++ ) {
        HTML += `<div class="item" ${ data[i].status === 1 ? 'data-status="active"' : '' }>
                    <i class="fa fa-check-square"></i>
                    <div class="info">
                        <div class="main-info">${data[i].title}</div>
                        <div class="secondary-info">${data[i].description}</div>
                    </div>
                    <i class="fa fa-trash"></i>
                    <i class="fa fa-pencil"></i>
                </div>`;
    }
    HTML += '</div>';

    return $('.admin-editor section').html(HTML);
}

function renderForm() {
    var HTML = '';
    return HTML;
}