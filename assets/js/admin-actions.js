"use strict";

$('i.fa[data-admin="edit-section"]').click(function(){
    var section = $(this).attr('data-section'),
        editor = $('.admin-editor');
    $('body').addClass('show-admin-editor');
    editor.attr('data-section', section)
        .find('.list').html('loading '+section+'...');
    getSectionInfo(section);
});

$('.editor-background').click(function(){
    $('body').removeClass('show-admin-editor');
});

$('.admin-editor > section').on('click', '.list .fa-check-square', function(){
    var $item = $(this).parent();
    if ($item.attr('data-status')) {
        $item.removeAttr('data-status');
    } else {
        $item.attr('data-status', 'active');
    }
});

$('.admin-editor > header').on('click', '.fa-plus', function(){
    console.log('sukurti nauja elementa');
    var section = $('.admin-editor').attr('data-section');
    editItem( section );
});

$('.admin-editor > section').on('click', '.list .fa-pencil', function(){
    console.log('redaguojame elementa');
    var index = $(this).parent().index(),
        section = $('.admin-editor').attr('data-section');
    editItem( section, index );
});

$('.admin-editor > section').on('click', '.list .fa-trash', function(){
    if ( confirm('Ar tikrai nori ištrinti?') ) {
        console.log('istriname elementa');
        $(this).parent().remove();
    }
});