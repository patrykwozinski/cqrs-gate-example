<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 09:03
 */
declare(strict_types=1);

namespace App\Application\Shared;


interface Historable
{
	public function identifier(): string;

	/**
	 * Get time to expire.
	 *
	 * @return int
	 */
	public function expireAfter(): int;
}
