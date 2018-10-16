<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 08:54
 */
declare(strict_types=1);

namespace App\Infrastructure;

// This is only pseudo-code redis implementation.
final class Redis
{
	public function expire(string $key, int $seconds): void
	{
		//
	}

	public function incrementHash(string $key): void
	{
		//
	}
}
