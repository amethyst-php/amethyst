<?php

namespace Railken\Laravel\Core\Action\CsvReport;

use Illuminate\Support\ServiceProvider;

class CsvReportServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        CsvReport::observe(CsvReportObserver::class);
    }
}
