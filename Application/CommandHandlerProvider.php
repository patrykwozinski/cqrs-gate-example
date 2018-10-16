<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 09:25
 */
declare(strict_types=1);

namespace App\Application;


use App\Application\Exception\MissingHandlerForCommandException;

final class CommandHandlerProvider
{
	/** @var CommandHandlerInterface[] */
	private $handlers;

	public function registerCommandHandler(CommandHandlerInterface $commandHandler, string $commandIdentity): void
	{
		$this->handlers[$commandIdentity] = $commandHandler;
	}

	public function handlerFor(CommandInterface $command): CommandHandlerInterface
	{
		if (isset($this->handlers[$command->commandIdentity()]))
		{
			return $this->handlers[$command->commandIdentity()];
		}

		throw MissingHandlerForCommandException::forCommand($command);
	}
}
