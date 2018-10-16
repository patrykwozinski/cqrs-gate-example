<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 09:43
 */
declare(strict_types=1);

namespace App\Application\Exception;


use App\Application\CommandInterface;

final class RunningStoppedException extends \RuntimeException
{
	public static function forCommand(CommandInterface $command, \Exception $exception): self
	{
		$message = sprintf('Running stopped for command %s with exception: %s', $command->commandIdentity(), $exception->getMessage());

		return new self($message);
	}
}
