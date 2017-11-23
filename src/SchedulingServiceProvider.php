<?php

namespace Jblv\Admin\Scheduling;

use Illuminate\Support\ServiceProvider;

class SchedulingServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'daimakuai-ext-scheduling');

        Scheduling::boot();
    }
}
