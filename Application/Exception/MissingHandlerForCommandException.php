<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 09:28
 */
declare(strict_types=1);

namespace App\Application\Exception;


use App\Application\CommandInterface;

final class MissingHandlerForCommandException extends \RuntimeException
{
	public static function forCommand(CommandInterface $command): self
	{
		$message = sprintf('Missing handler for command identified by: %s', $command->commandIdentity());

		return new self($message);
	}
}
