<?php

namespace Railken\LaraOre\Report\Pdf;

use Illuminate\Support\ServiceProvider;

class PdfServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        Pdf::observe(PdfObserver::class);
    }
}
