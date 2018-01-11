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

use TeamELF\Event\WelcomeMessageNeedsToBeSent;
use TeamELF\Ext\Mailer\Driver;

class WelcomeMessageListener
{
    public function subscribe()
    {
        app()->listen(WelcomeMessageNeedsToBeSent::class, [$this, 'handler']);
    }

    public function handler(WelcomeMessageNeedsToBeSent $event)
    {
        $member = $event->getMember();
        Driver::createWithDefaultMailer()
            ->subject('欢迎 ' . $member->getName())
            ->view('@ext-mailer/welcome.twig', [
                'name' => $member->getName(),
                'username' => $member->getUsername(),
                'url' => env('BASE_URL')
                    . '/password/reset?email='
                    . urlencode($member->getEmail())
            ])->send($member->getEmail());
    }
}
