<?php

namespace Railken\Laravel\Core\Action\Email;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Collection;

class EmailManager extends ModelManager
{
    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class,
        Attributes\Name\NameAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
        Attributes\DeletedAt\DeletedAtAttribute::class,
        Attributes\Targets\TargetsAttribute::class,
        Attributes\Subject\SubjectAttribute::class,
        Attributes\Template\TemplateAttribute::class,
        Attributes\MockData\MockDataAttribute::class
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\EmailNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new EmailRepository($this));
        $this->setSerializer(new EmailSerializer($this));
        $this->setValidator(new EmailValidator($this));
        $this->setAuthorizer(new EmailAuthorizer($this));

        parent::__construct($agent);
    }

    /**
     * Resolve event.
     *
     * @param Email $action
     * @param mixed $event
     */
    public function resolve(Email $action, $event)
    {
        $data = (array)$event;

        $targets = (new Collection($action->targets))->map(function ($target) use ($event) {
            return str_replace("{{user.email}}", $event->user->email, $target);
        })->toArray();

        $filename = $this->generateViewFile($action->template, "actions-emails-".$action->id);

        $mail = new Mailable();
        $mail->subject($action->subject);
        $mail->view($filename, $data);
        $mail->to($targets);

        Mail::to([])->queue($mail);
    }

    public function generateViewFile($html, $url)
    {
        $path = Config::get('view.paths.0');

        $view = "cache/".$url."-".hash('sha1', $url);

        $filename = $path."/".$view.".twig";

        !file_exists(dirname($filename)) && mkdir(dirname($filename), 0777, true);

        file_put_contents($filename, $html);

        return $view;
    }
}
