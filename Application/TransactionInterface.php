<?php
/**
 * Created by PhpStorm.
 * User: patryk.wozinski
 * Date: 16/10/2018
 * Time: 09:32
 */
declare(strict_types=1);

namespace App\Application;


interface TransactionInterface
{
	public function beginTransaction(): void;

	public function rollbackTransaction(): void;

	public function commitTransaction(): void;
}