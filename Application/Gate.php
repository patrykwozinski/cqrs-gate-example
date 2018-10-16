<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 08:19
 */
declare(strict_types=1);

namespace App\Application;


use App\Application\Exception\DuplicatedCommandException;
use App\Application\Shared\Asynchronous;

final class Gate implements GateInterface
{
	/** @var GateHistoryInterface */
	private $gateHistory;

	/** @var LoggerInterface */
	private $logger;

	/** @var QueueInterface */
	private $queue;

	/** @var RunEnvironment */
	private $runEnvironment;

	public function __construct(
		GateHistoryInterface $gateHistory,
		LoggerInterface $logger,
		QueueInterface $queue,
		RunEnvironment $runEnvironment
	) {
		$this->gateHistory    = $gateHistory;
		$this->logger         = $logger;
		$this->queue          = $queue;
		$this->runEnvironment = $runEnvironment;
	}

	public function dispatch(CommandInterface $command): void
	{
		try
		{
			$this->gateHistory->register($command);
		}
		catch (DuplicatedCommandException $exception)
		{
			$this->logger->info($exception);

			return;
		}

		if ($command instanceof Asynchronous)
		{
			// Queue should pass command to RunEnvironment
			$this->queue->push($command);

			return;
		}

		$this->runEnvironment->run($command);
	}
}
