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
use TeamELF\Http\AbstractController;

class MailerListController extends AbstractController
{
    protected $needPermissions = ['mailer.list'];

    /**
     * handle the request
     *
     * @return Response
     */
    public function handler(): Response
    {
        $response = [];
        foreach (Mailer::all() as $mailer) {
            $response[] = [
                'id' => $mailer->getId(),
                'default' => $mailer->getDefault(),
                'remark' => $mailer->getRemark(),
                'driver' => $mailer->getDriver(),
                'host' => $mailer->getHost(),
                'port' => $mailer->getPort(),
                'encryption' => $mailer->getEncryption(),
                'username' => $mailer->getUsername(),
                'password' => $mailer->getPassword(),
                'sender' => $mailer->getSender()
            ];
        }
        return response($response);
    }
}
