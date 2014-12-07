<?php namespace Anomaly\FizlPages\Page\Component\Header\Command;

use Anomaly\FizlPages\Page\Component\Header\Contract\Decorator;

/**
 * Class DecorateHeaderCommandHandler
 *
 * @package Anomaly\FizlPages\Page\Component\Header\Command
 */
class DecorateHeaderCommandHandler
{
    public function __construct()
    {

    }

    public function handle(DecorateHeaderCommand $command)
    {
        $key   = $command->getKey();
        $value = $command->getValue();

        $decorators = config('fizl-pages::header_decorators', []);

        if (array_key_exists($key, $decorators)) {
            $decorator = app($decorators[$key]);
            if ($decorator instanceof Decorator) {
                $value = $decorator->decorate($value);
            }
        }

        return $value;
    }

} 