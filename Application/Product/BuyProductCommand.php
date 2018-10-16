<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 09:09
 */
declare(strict_types=1);

namespace App\Application\Product;


use App\Application\CommandInterface;
use App\Application\Shared\Historable;

final class BuyProductCommand implements CommandInterface, Historable
{
	// In the next step move to configuration
	private const EXPIRE_AFTER = 5;

	/** @var int */
	private $userId;

	/** @var int */
	private $productId;

	public function userId(): int
	{
		return $this->userId;
	}

	public function identifier(): string
	{
		$identifier = sprintf('%s-%s', $this->userId, $this->productId);

		return $identifier;
	}

	public function expireAfter(): int
	{
		return self::EXPIRE_AFTER;
	}
}
