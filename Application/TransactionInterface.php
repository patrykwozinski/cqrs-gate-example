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
	public function begin(): void;

	public function rollback(): void;

	public function commit(): void;
}