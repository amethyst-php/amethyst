<?php

namespace Railken\LaraOre\Report\Pdf;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;
use Illuminate\Support\Facades\Config;

class PdfManager extends ModelManager
{
    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class, 
        Attributes\Name\NameAttribute::class, 
        Attributes\Filename\FilenameAttribute::class,
        Attributes\Template\TemplateAttribute::class,
        Attributes\MockData\MockDataAttribute::class, 
        Attributes\CreatedAt\CreatedAtAttribute::class, 
        Attributes\UpdatedAt\UpdatedAtAttribute::class, 
        Attributes\Description\DescriptionAttribute::class
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\PdfNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new PdfRepository($this));
        $this->setSerializer(new PdfSerializer($this));
        $this->setValidator(new PdfValidator($this));
        $this->setAuthorizer(new PdfAuthorizer($this));

        parent::__construct($agent);
    }

    public function generateViewFile($html, $url)
    {
        $path = Config::get('view.paths.0');

        $view = 'cache/'.$url.'-'.hash('sha1', $url);

        $filename = $path.'/'.$view.'.twig';

        !file_exists(dirname($filename)) && mkdir(dirname($filename), 0777, true);

        file_put_contents($filename, $html);

        return $view;
    }
}
