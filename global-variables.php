<?php

$DOMAIN_NAME = 'portfolio';
$DOMAIN = 'https://www.uxfix.lt/';
$LOCALHOST = false;
$VERSION = 1;
$LANG_DEFAULT = 'lt';

$ERRORS = [];

$LANG_LIST = ['en', 'lt'];
$DEV_LANG_LIST = ['ru'];

$LANG_DETAILS = (object)[
    'en' => (object)[
        'short' => 'en',
        'full' => 'English'
    ],
    'lt' => (object)[
        'short' => 'lt',
        'full' => 'Lietuvių'
    ],
    'ru' => (object)[
        'short' => 'ru',
        'full' => 'Русский'
    ]
];

$URL_ALLOWED_CHARS = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','-','0','1','2','3','4','5','6','7','8','9'];

$PERIOD_UNITS = ['hours', 'days', 'weeks', 'months'];

$WEEKDAYS = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
$WEEKDAYS_SHORT = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

$SYSTEM_ROLES = ['super-admin', 'admin', 'translator', 'content'];
$SCHOOL_ADMIN_ROLES = ['director', 'administration'];
$SCHOOL_ROLES = ['director', 'administration', 'teacher', 'student'];
$ALL_ROLES = ['super-admin', 'admin', 'translator', 'content', 'director', 'administration', 'teacher', 'student'];

?>