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

use TeamELF\Event\VerifyTokenNeedsToBeSent;
use TeamELF\Ext\Mailer\Driver;

class VerifyTokenListener
{
    public function subscribe()
    {
        app()->listen(VerifyTokenNeedsToBeSent::class, [$this, 'handler']);
    }

    public function handler(VerifyTokenNeedsToBeSent $event)
    {
        $member = $event->getMember();
        Driver::createWithDefaultMailer()
            ->subject('重置密码')
            ->view('@ext-mailer/token.twig', [
                'token' => $event->getToken()
            ])->send($member->getEmail());
    }
}
