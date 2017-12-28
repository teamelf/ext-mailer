<?php

/**
 * This file is part of TeamELF
 *
 * (c) GuessEver <guessever@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TeamELF\Ext\Mailer\Listener;

use TeamELF\Event\RoutesWillBeLoaded;
use TeamELF\Ext\Mailer\Api\MailerCreateController;
use TeamELF\Ext\Mailer\Api\MailerDeleteController;
use TeamELF\Ext\Mailer\Api\MailerListController;
use TeamELF\Ext\Mailer\Api\MailerSetAsDefaultController;
use TeamELF\Ext\Mailer\Api\MailerTestController;
use TeamELF\Ext\Mailer\Api\MailerUpdateController;

class RoutesListener
{
    public function subscribe()
    {
        app()->listen(RoutesWillBeLoaded::class, [$this, 'handler']);
    }

    public function handler(RoutesWillBeLoaded $event)
    {
        $event->getRouter()
            ->prefix('/api/mailer')
            ->get('mailer-list', '', MailerListController::class)
            ->post('mailer-create', '', MailerCreateController::class)
            ->put('mailer-update', '/{id}', MailerUpdateController::class)
            ->put('mailer-set-default', '/{id}/default', MailerSetAsDefaultController::class)
            ->delete('mailer-delete', '/{id}', MailerDeleteController::class)
            ->post('mailer-test', '/{id}/test', MailerTestController::class);
    }
}
