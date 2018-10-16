<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 09:21
 */
declare(strict_types=1);

namespace App\Application\Product;


use App\Application\CommandHandlerInterface;
use App\Application\CommandInterface;

final class BuyProductCommandHandler implements CommandHandlerInterface
{
	/**
	 * @param CommandInterface | BuyProductCommand $command
	 */
	public function handle(CommandInterface $command): void
	{
		// Buying, saving blah blah blah.
	}
}
