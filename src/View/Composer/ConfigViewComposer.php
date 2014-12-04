<?php namespace Anomaly\FizlPages\View\Composer;

use Illuminate\Contracts\View\View;

/**
 * Class ConfigDataComposer
 *
 * @package Anomaly\FizlCore\View\Composer
 */
class ConfigViewComposer
{

    public function compose(View $view)
    {
        $view->with('data', config('fizl-pages::data'));
    }

} 