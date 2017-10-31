<?php

namespace InstanceManager;

interface AdapterInterface
{
	public function createInstances($count);

	public function describeInstances($names);

	public function terminateInstances($names);
}