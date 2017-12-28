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
use TeamELF\Ext\Mailer\Driver;
use TeamELF\Ext\Mailer\Mailer;
use TeamELF\Exception\HttpForbiddenException;
use TeamELF\Http\AbstractController;

class MailerTestController extends AbstractController
{
    protected $needPermissions = ['mailer.update'];

    /**
     * handle the request
     *
     * @return Response
     * @throws HttpForbiddenException
     */
    public function handler(): Response
    {
        $mailer = Mailer::find($this->getParameter('id'));
        if (!$mailer) {
            throw new HttpForbiddenException();
        }
        $driver = new Driver($mailer);
        return response([
            'connection' => $driver->test()
        ]);
    }
}
