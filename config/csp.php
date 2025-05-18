<?php

use Spatie\Csp\Presets\Basic;

return [
	'policies' => [
		Basic::class => [
			'script-src' => [
				'self',
				// 'nonce',
				'unsafe-inline', // Remove this in production
				'unsafe-eval',   // Remove this in production
			],
		],
	],
];
