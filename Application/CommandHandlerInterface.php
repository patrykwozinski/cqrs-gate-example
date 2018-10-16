<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 09:21
 */
declare(strict_types=1);

namespace App\Application;


interface CommandHandlerInterface
{
	public function handle(CommandInterface $command): void;
}
