<?php

return [
    'avatar_column' => 'avatar',
    'disk' => 'public',
    'visibility' => 'public',
    'avatar_directory' => 'avatar',
    'avatar_rules' => [
        'image',
        'max:5120', // 5MB
        'dimensions:min_width=100,min_height=100',
    ],
    'show_custom_fields' => false,
];
