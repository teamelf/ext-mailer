<?php

/**
 * This file is part of TeamELF
 *
 * (c) GuessEver <guessever@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TeamELF\Ext\Mailer\Api;

use Symfony\Component\HttpFoundation\Response;
use TeamELF\Ext\Mailer\Mailer;
use TeamELF\Exception\HttpForbiddenException;
use TeamELF\Http\AbstractController;

class MailerCreateController extends AbstractController
{
    protected $needPermissions = ['mailer.create'];

    /**
     * handle the request
     *
     * @return Response
     * @throws HttpForbiddenException
     */
    public function handler(): Response
    {
        $mailer = new Mailer([
            'driver' => 'smtp',
            'host' => 'host',
            'port' => 0,
            'encryption' => '',
            'username' => 'username',
            'password' => 'password',
            'sender' => 'sender',
            'remark' => ''
        ]);
        $mailer->save();
        return response([
            'id' => $mailer->getId()
        ]);
    }
}
