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
use TeamELF\Event\MessageNeedsToBeSent;

class MessageListener
{
    public function subscribe()
    {
        app()->listen(MessageNeedsToBeSent::class, [$this, 'handler']);
    }

    public function handler(MessageNeedsToBeSent $event)
    {
        $receivers = [];
        foreach ($event->getReceivers() as $receiver) {
            $receivers[] = $receiver->getEmail();
        }
        Driver::createWithDefaultMailer()
            ->subject($event->getSubject())
            ->body($event->getBody())
            ->send($receivers);
    }
}
