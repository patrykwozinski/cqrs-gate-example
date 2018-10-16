<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 08:50
 */
declare(strict_types=1);

namespace Application;


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
		//

		throw DuplicatedCommandException::forCommand($command);
	}
}
