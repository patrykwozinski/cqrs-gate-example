<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 08:20
 */
declare(strict_types=1);

namespace App\Application;


interface CommandInterface
{
	public function commandIdentity(): string;
}
