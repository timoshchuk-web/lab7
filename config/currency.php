<?php
return [
    "fixer"=>[
        'api_key'=>env("FIXER_API_KEY", "b616bcec93bed7ec2c83745000dc997e"),
        'base_url'=>env("FIXER_BASE_URL", 'http://data.fixer.io/api/'),
    ],
];
