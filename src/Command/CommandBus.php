<?php

namespace DevPledge\Integrations\Command;

use Slim\Container;

/**
 * Class CommandBus
 * @package DevPledge\Integrations\Command
 */
class CommandBus {

	protected $commandHandlerMap = [];


	/**
	 * @param AbstractCommand $command
	 *
	 * @throws \Interop\Container\Exception\ContainerException
	 */
	public function handle( AbstractCommand $command ) {

		$handlerClass = $this->getHandler( get_class( $command ) );
		$handler      = new $handlerClass();
		call_user_func_array( $handler, array( $command ) );
	}

	/**
	 * @param $key
	 *
	 * @return AbstractCommandHandler|null
	 */
	protected function getHandler( $key ): ?AbstractCommandHandler {
		if ( isset( $this->commandHandlerMap[ $key ] ) ) {
			return $this->commandHandlerMap[ $key ];
		}

		return null;
	}

	/**
	 * @param AbstractCommandHandler $commandHandler
	 *
	 * @return $this
	 */
	public function setHandler( AbstractCommandHandler $commandHandler ) {
		$this->commandHandlerMap[ $commandHandler->getContainerKey() ] = $commandHandler;

		return $this;
	}


}