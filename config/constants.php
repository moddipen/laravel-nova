<?php

return [
    'country' => [
        'status_options' => [
            1 => 'label.active',
            0 => 'label.inactive',
        ],

        'fields' => [
            'name' => 'label.name',
            'iso' => 'label.iso',
            'code' => 'label.code',
            'is_active' => 'label.status',
            'action' => 'label.action',
        ],
    ],

    'language' => [
        'status_options' => [
            1 => 'label.active',
            0 => 'label.inactive',
        ],
        'fields' => [
            'name' => 'label.name',
            'code' => 'label.language_code',
            'is_active' => 'label.status',
            'action' => 'label.action',
        ],
    ],

    'client' => [
        'fields' => [
            'name' => 'label.name',
            'action' => 'label.action',
        ],
    ],

    'admin' => [
        'fields' => [
            'email' => 'label.email',
            'first_name' => 'label.first_name',
            'last_name' => 'label.last_name',
            'date_of_birth' => 'label.date_of_birth',
            'gender_id' => 'label.gender_id',
            'country_id' => 'label.country_id',
            'company_id' => 'label.company_id',
            'action' => 'label.action',
        ],
    ],
];
