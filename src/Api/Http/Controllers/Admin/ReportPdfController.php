<?php

namespace Railken\LaraOre\Api\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Railken\LaraOre\Report\Pdf\PdfManager;
use Railken\LaraOre\Api\Http\Controllers\RestController;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestCreateTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestIndexTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestRemoveTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestShowTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestUpdateTrait;
use Illuminate\Support\Facades\App;
use Twig;

class ReportPdfController extends RestController
{
    use RestIndexTrait;
    use RestShowTrait;
    use RestCreateTrait;
    use RestUpdateTrait;
    use RestRemoveTrait;

    /**
     * List of params that can be used to perform a search in the index.
     *
     * @var array
     */
    public static $query = [
        'id',
        'name',
        'filename',
        'template',
        'mock_data',
        'created_at',
        'updated_at',
    ];

    /**
     * List of params that can be selected in the index.
     *
     * @var array
     */
    public static $fillable = [
        'name',
        'filename',
        'subject',
        'template',
        'mock_data',
    ];

    public function __construct(PdfManager $manager)
    {
        $this->manager = $manager;
        parent::__construct();
    }

    /**
     * Create a new instance for query.
     *
     * @return \Illuminate\DataBase\Query\Builder
     */
    public function getQuery()
    {
        return $this->manager->repository->getQuery();
    }

    /**
     * Render a template.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function renderTemplate(Request $request)
    {
        $data = $request->input('mock_data');
        $template = $request->input('template');
        $filename = $this->manager->generateViewFile($template, 'tmp-'.md5($request->input('uid', microtime())));

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHtml(Twig::render($filename, $data));
        return $pdf->stream();
    }
}
