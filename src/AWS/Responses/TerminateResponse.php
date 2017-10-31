<?php
/**
 * Created by PhpStorm.
 * User: majesko
 * Date: 31.10.17
 * Time: 12:37
 */

namespace InstanceManager\AWS\Responses;


use Aws\Result;
use InstanceManager\Models\Instance;

class TerminateResponse {

	private $terminatedInstances;

	/**
	 * @param Result $result
	 */
	public function __construct(Result $result) {
		$this->terminatedInstances = $result['TerminatingInstances'];
	}

	/**
	 * @return array
	 */
	public function getInstances() {
		return array_map(function($instance) {
			return new Instance([
				'name' => $instance['InstanceId'],
				'address' => null,
			]);
		}, $this->terminatedInstances);
	}
}