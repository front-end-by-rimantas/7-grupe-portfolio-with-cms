"use strict";

$('i.fa[data-admin="edit-section"]').click(function(){
    var editor = $('.admin-editor');
    DATA.editingSection = $(this).attr('data-section');

    $('body').addClass('show-admin-editor');
    editor.attr('data-section', DATA.editingSection)
        .attr('data-type', 'list')
        .find('.list').html('loading '+DATA.editingSection+'...');
    
    getSectionInfo();
});

$('.editor-background').click(function(){
    $('body').removeClass('show-admin-editor');
});

// general checkbox
$('.admin-editor > section').on('click', '.fa-check-square', function(){
    var $item = $(this);
    if ($item.attr('data-status')) {
        $item.removeAttr('data-status');
    } else {
        $item.attr('data-status', 'active');
    }
});

// add new element in list view
$('.admin-editor > header').on('click', '.fa-plus', function(){
    var editor = $('.admin-editor'),
        section = editor.attr('data-section');
    editor.attr('data-type', 'inner');
    editItem( section );
});

// editing element in list view
$('.admin-editor > section').on('click', '.list .fa-pencil', function(){
    var index = $(this).parent().index(),
        editor = $('.admin-editor'),
        section = editor.attr('data-section');
    editor.attr('data-type', 'inner');
    editor.attr('data-index', $(this).parent().index());
    editItem( section, index );
});

// remove elment in list view
$('.admin-editor > section').on('click', '.list .fa-trash', function(){
    if ( confirm('Ar tikrai nori ištrinti?') ) {
        console.log('istriname elementa');
        $(this).parent().remove();
    }
});

// cancel editing element from form
$('.admin-editor > footer .btn[data-action="cancel"]').click(function(){
    var editor = $(this).parents('.admin-editor'),
        section = editor.attr('data-section');
    renderEditorList( section, DATA[section].response );
    editor.attr('data-type', 'list');
});

// updating element from form
$('.admin-editor > footer .btn[data-action="save"]').click(function(){
    var editor = $(this).parents('.admin-editor'),
        section = editor.attr('data-section'),
        index = parseInt(editor.attr('data-index'));
    updateFormElement( section, index );
});