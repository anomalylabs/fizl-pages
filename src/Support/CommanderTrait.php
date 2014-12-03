<?php namespace Anomaly\FizlPages\Support;


trait CommanderTrait {

    /**
     * Execute the command.
     *
     * @param  string $command
     * @param  array $decorators
     * @return mixed
     */
    protected function execute($command, $decorators = [])
    {
        $bus = $this->getCommandBus();

        // If any decorators are passed, we'll filter through and register them
        // with the CommandBus, so that they are executed first.
        foreach ($decorators as $decorator)
        {
            $bus->decorate($decorator);
        }

        return $bus->execute($command);
    }

    /**
     * Fetch the command bus
     *
     * @return mixed
     */
    public function getCommandBus()
    {
        return app('Laracasts\Commander\CommandBus');
    }

}
