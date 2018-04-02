<?php
namespace DevPledge\Integrations\Command;

/**
 * Class ExtrapolateCommandHandlers
 * @package DevPledge\Integrations\Command
 */
class ExtrapolateCommandHandlers extends AbstractExtrapolateForContainer {
	/**
	 * @param AbstractCommandHandler $commandHandler
	 *
	 * @throws \Psr\Container\ContainerExceptionInterface
	 * @throws \Psr\Container\NotFoundExceptionInterface
	 */
	protected function add( AbstractCommandHandler $commandHandler ) {
		AddCommandHandler::commandHandler( $commandHandler );
	}

}