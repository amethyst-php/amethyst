<?php

namespace Railken\Laravel\Core\Action\Notification;

use Railken\Laravel\Manager\Contracts\EntityContract;

class NotificationObserver
{
    /**
     * Listen to the entity retrieved event.
     *
     * @param EntityContract $entity
     *
     * @return void
     */
    public function retrieved(EntityContract $entity)
    {
        // ..
    }

    /**
     * Listen to the entity creating event.
     *
     * @param EntityContract $entity
     *
     * @return void
     */
    public function creating(EntityContract $entity)
    {
        // ..
    }

    /**
     * Listen to the entity created event.
     *
     * @param EntityContract $entity
     *
     * @return void
     */
    public function created(EntityContract $entity)
    {
        // ..
    }

    /**
     * Listen to the entity updating event.
     *
     * @param EntityContract $entity
     *
     * @return void
     */
    public function updating(EntityContract $entity)
    {
        // ..
    }

    /**
     * Listen to the entity updated event.
     *
     * @param EntityContract $entity
     *
     * @return void
     */
    public function updated(EntityContract $entity)
    {
        // ..
    }

    /**
     * Listen to the entity saving event.
     *
     * @param EntityContract $entity
     *
     * @return void
     */
    public function saving(EntityContract $entity)
    {
        // ..
    }

    /**
     * Listen to the entity saved event.
     *
     * @param EntityContract $entity
     *
     * @return void
     */
    public function saved(EntityContract $entity)
    {
        // ..
    }

    /**
     * Listen to the entity deleting event.
     *
     * @param EntityContract $entity
     *
     * @return void
     */
    public function deleting(EntityContract $entity)
    {
        // ..
    }

    /**
     * Listen to the entity deleted event.
     *
     * @param EntityContract $entity
     *
     * @return void
     */
    public function deleted(EntityContract $entity)
    {
        // ..
    }

    /**
     * Listen to the entity restoring event.
     *
     * @param EntityContract $entity
     *
     * @return void
     */
    public function restoring(EntityContract $entity)
    {
        // ..
    }

    /**
     * Listen to the entity restored event.
     *
     * @param EntityContract $entity
     *
     * @return void
     */
    public function restored(EntityContract $entity)
    {
        // ..
    }
}
