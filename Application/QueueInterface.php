<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 09:10
 */
declare(strict_types=1);

namespace App\Application;


use App\Application\Product\Asynchronous;

interface QueueInterface
{
	public function push(Asynchronous $asynchronous): void;
}
