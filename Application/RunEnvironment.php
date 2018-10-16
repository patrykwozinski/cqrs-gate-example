<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 09:12
 */
declare(strict_types=1);

namespace App\Application;


use App\Application\Exception\RunningStoppedException;

final class RunEnvironment
{
	/** @var CommandHandlerProvider */
	private $handlerProvider;

	/** @var TransactionInterface */
	private $transaction;

	public function __construct(CommandHandlerProvider $commandHandlerProvider, TransactionInterface $transaction)
	{
		$this->handlerProvider = $commandHandlerProvider;
		$this->transaction     = $transaction;
	}

	public function run(CommandInterface $command): void
	{
		$commandHandler = $this->handlerProvider->handlerFor($command);

		$this->transaction->beginTransaction();

		try
		{
			$commandHandler->handle($command);

			$this->transaction->commitTransaction();
		}
		catch (\Exception $exception)
		{
			$this->transaction->rollbackTransaction();

			// Here we can add logging or something else.
			throw RunningStoppedException::forCommand($command);
		}
	}
}
