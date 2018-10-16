<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 08:19
 */
declare(strict_types=1);

namespace App\Application;


interface GateInterface
{
	public function dispatch(CommandInterface $command): void;
}
