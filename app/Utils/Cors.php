<?php

namespace App\Utils;

class Cors
{
	public static function getCORSHeaders(): array
	{
		return [
			'Access-Control-Allow-Origin' => env('ACCESS_CONTROL_ALLOW_ORIGIN', '*'),
			'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
			'Access-Control-Allow-Headers' => 'Origin, Content-Type, Accept, Authorization, X-Requested-With',
			'Access-Control-Expose-Headers' => 'Origin, Content-Type, Accept, Authorization, X-Requested-With, PR-Development-Detail-Error',
			'Access-Control-Allow-CredentialsHeaders' => 'true'
		];
	}
}
