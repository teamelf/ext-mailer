<?php

/**
 * This file is part of TeamELF
 *
 * (c) GuessEver <guessever@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

(new \TeamELF\Ext\Mailer\Listener\RoutesListener())->subscribe();
(new \TeamELF\Ext\Mailer\Listener\AssetsListener())->subscribe();
(new \TeamELF\Ext\Mailer\Listener\VerifyTokenListener())->subscribe();
(new \TeamELF\Ext\Mailer\Listener\WelcomeMessageListener())->subscribe();
