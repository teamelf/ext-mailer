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

use TeamELF\Ext\Mailer\Driver;
use TeamELF\Ext\Mailer\Event\MessageNeedsToBeSent;

class MessageListener
{
    public function subscribe()
    {
        app()->listen(MessageNeedsToBeSent::class, [$this, 'handler']);
    }

    public function handler(MessageNeedsToBeSent $event)
    {
        Driver::createWithDefaultMailer()
            ->subject($event->getSubject())
            ->body($event->getBody())
            ->send($event->getReceivers());
    }
}
