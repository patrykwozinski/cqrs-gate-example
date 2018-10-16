<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 08:52
 */
declare(strict_types=1);

namespace App\Application\Exception;


use App\Application\CommandInterface;

final class DuplicatedCommandException extends \RuntimeException
{
	public static function forCommand(CommandInterface $command): self
	{
		$message = sprintf('', $command);

		return new self($message);
	}
}
