"use strict";

$('i.fa[data-admin="edit-section"]').click(function(){
    var section = $(this).attr('data-section');
    $('body').addClass('show-admin-editor');
    $('.admin-editor .list').html('loading '+section+'...');
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
    editItem();
});

$('.admin-editor > section').on('click', '.list .fa-pencil', function(){
    console.log('redaguojame elementa');
    var data = {};
    editItem( data );
});

$('.admin-editor > section').on('click', '.list .fa-trash', function(){
    if ( confirm('Ar tikrai nori ištrinti?') ) {
        console.log('istriname elementa');
        $(this).parent().remove();
    }
});