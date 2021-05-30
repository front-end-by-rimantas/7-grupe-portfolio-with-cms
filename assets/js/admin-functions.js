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
            renderEditorList( DATA.editingSection, callback.response );
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
    return `<div class="form-row" data-type="checkbox">
                <label>${title}</label>
                <i class="fa fa-check-square" ${ value === 1 ? 'data-status="active"' : '' }></i>
            </div>`;
}

function renderFormIconPicker( title, value ) {
    return `<div class="form-row" data-type="icon-picker">
                <label>${title}</label>
                <div class="icon-picker">
                    <div class="value">
                        <i class="fa fa-${value}"></i>                    
                    </div>
                    <input type="text">
                    <div class="list">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                    </div>
                </div>
            </div>`;
}

function renderFormInput( title, value='' ) {
    return `<div class="form-row" data-type="input">
                <label>${title}</label>
                <input type="text" value="${value}">
            </div>`;
}

function renderFormTextarea( title, value='' ) {
    return `<div class="form-row" data-type="textarea">
                <label>${title}</label>
                <textarea>${value}</textarea>
            </div>`;
}

function updateFormElement( section, index ) {
    var new_data = {},
        editor = $('.admin-editor'),
        count = editor.find('.form-row').length,
        row,
        keyword = '',
        value;
    
    // add index
    new_data.index = index;

    for ( var i=0; i<count; i++ ) {
        row = editor.find('.form-row').eq(i);
        keyword = row.find('label').text();
        value = getFormValue( i );
        new_data[keyword] = value;
    }

    console.log('siunciami duomenys:');
    console.log( new_data );


    var data = {
        api: 'section-element-update',
        section_name : DATA.editingSection,
        new_data: new_data
    };

    // requestStart('loading...');

    $.post(API, data, function(callback) {
        if (callback.success === 'SUCCESS') {
            DATA[ DATA.editingSection ].response[index] = new_data;
            renderEditorList( DATA.editingSection, DATA[ DATA.editingSection ].response );
            editor.attr('data-type', 'list');
            updateUserInterface( DATA.editingSection );
            // requestEnd( true, callback.msg );
        } else {
            // requestEnd( false, callback.msg );
        }
    }, "json");


    return;
}

function getFormValue( rowIndex ) {
    var rowElement = $('.admin-editor .form-row').eq(rowIndex),
        value;

    switch ( rowElement.attr('data-type') ) {
        case 'checkbox':
            value = 0;
            if ( rowElement.find('.fa-check-square').attr('data-status') === 'active' ) {
                value = 1;
            }
            break;
        
        case 'icon-picker':
            value = rowElement.find('.icon-picker > .value > i').attr('class').replace('fa fa-', '');
            break;
    
        case 'input':
            value = rowElement.find('input').val();
            break;
    
        case 'textarea':
            value = rowElement.find('textarea').val();
            break;
    
        default:
            break;
    }

    return value;
}

function updateUserInterface( section ) {
    switch ( section ) {
        case 'services':
            document.querySelector('#services .service-list').innerHTML = generateServices( DATA[section].response );
            break;
    
        default:
            break;
    }
    return;
}