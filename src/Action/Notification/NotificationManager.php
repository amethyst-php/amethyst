<?php

namespace Railken\LaraOre\Action\Notification;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;
use Illuminate\Support\Facades\Notification as NotificationFacade;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

class NotificationManager extends ModelManager
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
        Attributes\Description\DescriptionAttribute::class,
        Attributes\Targets\TargetsAttribute::class,
        Attributes\Template\TemplateAttribute::class,
        Attributes\MockData\MockDataAttribute::class,
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\NotificationNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new NotificationRepository($this));
        $this->setSerializer(new NotificationSerializer($this));
        $this->setValidator(new NotificationValidator($this));
        $this->setAuthorizer(new NotificationAuthorizer($this));

        parent::__construct($agent);
    }

    /**
     * Resolve event.
     *
     * @param Notification $action
     * @param mixed $event
     */
    public function resolve(Notification $action, $event)
    {
        $user = (new \Core\User\UserManager())->getRepository()->findOneById($event->user->id);
        $users = new Collection();

        $repository = (new \Core\User\UserManager())->getRepository();
        (new Collection($action->targets))->map(function ($target) use ($event, $repository, &$users) {
            if ($target === "{{user.id}}") {
                $users[] = $repository->findOneById($event->user->id);
            }

            if ($target === "@admin") {
                $users = $users->merge($repository->newQuery()->where('role', '=', 'admin')->get());
            }
        });

        $template = $action->template;
        $filename = $this->generateViewFile($template, $action->id);

        $response = view($filename, (array)$event);


        NotificationFacade::send($users, new BaseNotification($action, $event, $response->render()));
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
