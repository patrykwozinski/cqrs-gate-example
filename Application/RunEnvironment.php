<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 09:12
 */
declare(strict_types=1);

namespace App\Application;


final class RunEnvironment
{
	/** @var CommandHandlerProvider */
	private $handlerProvider;

	public function __construct(CommandHandlerProvider $commandHandlerProvider)
	{
		$this->handlerProvider = $commandHandlerProvider;
	}

	public function run(CommandInterface $command): void
	{
		$commandHandler = $this->handlerProvider->handlerFor($command);

		$commandHandler->handle($command);
	}
}
