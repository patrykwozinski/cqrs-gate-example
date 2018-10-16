<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 08:50
 */
declare(strict_types=1);

namespace App\Infrastructure;


use App\Application\CommandInterface;
use App\Application\Exception\DuplicatedCommandException;
use App\Application\GateHistoryInterface;
use App\Application\Shared\Historable;

class RedisGateHistory implements GateHistoryInterface
{
	/** @var Redis */
	private $redis;

	public function __construct(Redis $redis)
	{
		$this->redis = $redis;
	}

	public function register(CommandInterface $command): void
	{
		if ($command instanceof Historable)
		{
			if ($this->redis->exists($command->identifier()))
			{
				throw DuplicatedCommandException::forCommand($command);
			}

			$this->redis->incrementHash($command->identifier());
			$this->redis->expire($command->identifier(), $command->expireAfter());
		}
	}
}
