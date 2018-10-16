<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 09:05
 */
declare(strict_types=1);

namespace App\Application;


interface LoggerInterface
{
	public function info(string $string);
}
