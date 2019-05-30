"use strict";

// cia saugoma informacija apie visa projekta, kuria gauname per API is serverio
var DATA = {
    editingSection: '',
    services: {}
};

if ( window.location.host === 'localhost' )  {
    var DOMAIN = 'http://localhost/portfolio';
} else {
    var DOMAIN = 'https://www.uxfix.lt';
}

var API = DOMAIN+'/api/index.php';

function getSectionInfo() {
    if ( typeof(DATA.editingSection) !== 'string' || DATA.editingSection === '' ) {
        return;
    }

    var data = {
            api: 'section-info',
            section_name : DATA.editingSection
        };
    
    // requestStart('loading...');

    $.post(API, data, function(callback) {
        if (callback.success === 'SUCCESS') {
            DATA[ DATA.editingSection ] = callback;
            renderEditorList( DATA.editingSection, callback.response )
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
    
    return $('.admin-editor section').html( renderForm( form_structure, element_data ) );
}

function renderEditorList( section, data ) {
    var HTML = '<div class="list">';
    console.log(data);
    
    for ( var i=0; i<data.length; i++ ) {
        HTML += `<div class="item">
                    <i class="fa fa-check-square" ${ data[i].status === 1 ? 'data-status="active"' : '' }></i>
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

function renderForm( form, data ) {
    var HTML = '';

    for ( var i=0; i<form._order.length; i++ ) {
        switch ( form[ form._order[i] ] ) {
            case "status-selector":
                HTML += renderFormStatus( form._order[i], data[ form._order[i] ] );
                break;

            case "icon-picker":
                HTML += renderFormIconPicker( form._order[i], data[ form._order[i] ] );
                break;

            case "input":
                HTML += renderFormInput( form._order[i], data[ form._order[i] ] );
                break;

            case "textarea":
                HTML += renderFormTextarea( form._order[i], data[ form._order[i] ] );
                break;
        
            default:
                break;
        }
    }

    return HTML;
}

function renderFormStatus( title, value=0 ) {
    return `<div class="form-row">
                <label>${title}</label>
                <i class="fa fa-check-square" ${ value === 1 ? 'data-status="active"' : '' }></i>
            </div>`;
}

function renderFormIconPicker( title, value ) {
    return `<div class="form-row">
                <label>${title}</label>
                <div class="">ICON PICKER</div>
            </div>`;
}

function renderFormInput( title, value='' ) {
    return `<div class="form-row">
                <label>${title}</label>
                <input type="text" value="${value}">
            </div>`;
}

function renderFormTextarea( title, value='' ) {
    return `<div class="form-row">
                <label>${title}</label>
                <textarea>${value}</textarea>
            </div>`;
}