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

use TeamELF\Event\AppAssetsHaveBeAdded;

class AssetsListener
{
    public function subscribe()
    {
        app()->listen(AppAssetsHaveBeAdded::class, [$this, 'handler']);
    }

    public function handler(AppAssetsHaveBeAdded $event)
    {
        $event->getAssets()
            ->addJs(__DIR__ . '/../../assets/dist/mailer.js')
            ->entry('teamelf/mailer/main');
    }
}
