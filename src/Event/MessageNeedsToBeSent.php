<?php

/**
 * This file is part of TeamELF
 *
 * (c) GuessEver <guessever@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TeamELF\Ext\Mailer\Event;

use TeamELF\Event\AbstractEvent;

class MessageNeedsToBeSent extends AbstractEvent
{
    /**
     * @var array|string
     */
    protected $receivers = [];

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $body = null;

    function __construct($receivers, $subject, $body)
    {
        parent::__construct();
        $this->subject = $subject;
        $this->receivers = $receivers;
        $this->body = $body;
    }

    /**
     * @return array|string
     */
    public function getReceivers()
    {
        return $this->receivers;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
}
