<?php

/**
 * This file is part of TeamELF
 *
 * (c) GuessEver <guessever@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TeamELF\Ext\Mailer;

use TeamELF\Core\Config;
use TeamELF\Exception\HttpForbiddenException;
use TeamELF\View\ViewService;

class Driver
{
    /**
     * @var Mailer
     */
    protected $config;

    /**
     * @var \Swift_SmtpTransport
     */
    protected $driver;

    /**
     * @var \Swift_Message
     */
    protected $message;

    /**
     * Driver constructor.
     * @param Mailer $mailerConfig
     */
    function __construct(Mailer $mailerConfig)
    {
        $this->config = $mailerConfig;

        $this->driver = (new \Swift_SmtpTransport())
            ->setHost($mailerConfig->getHost())
            ->setPort($mailerConfig->getPort())
            ->setEncryption($mailerConfig->getEncryption())
            ->setUsername($mailerConfig->getUsername())
            ->setPassword($mailerConfig->getPassword());

        if (!$this->driver->isStarted()) {
            $this->driver->start();
        }

        $name = Config::get('name');
        $this->message = (new \Swift_Message())
            ->setFrom([$mailerConfig->getSender() => $name])
            ->setCharset('utf-8')
            ->setMaxLineLength(998);
    }

    /**
     * create a new instance with default configuration
     *
     * @return static
     * @throws HttpForbiddenException
     */
    public static function createWithDefaultMailer()
    {
        $m = Mailer::findBy(['default' => true]);
        if (!$m) {
            throw new HttpForbiddenException('default mailer config not exists!');
        }
        return new static($m);
    }

    /**
     * test connection
     *
     * @return bool
     */
    public function test()
    {
        return $this->driver->ping();
    }

    /**
     * set message subject
     *
     * @param string $subject
     * @return $this
     */
    public function subject($subject)
    {
        $name = Config::get('name');
        $subject = '[' . $name . '] ' . $subject;
        /**
         * strange subject encode error
         * occurred when there's both chinese and english
         * solution see: https://github.com/swiftmailer/swiftmailer/issues/665
         */
        $subject = '=?utf-8?B?'.base64_encode($subject).'?=';
        $this->message->setSubject($subject);
        return $this;
    }

    /**
     * set message body
     *
     * @param string $body
     * @param string $contentType
     * @return $this
     */
    public function body($body, $contentType = null)
    {
        $this->message->setBody($body, $contentType);
        return $this;
    }

    /**
     * set message body with twig template
     *
     * @param string $template
     * @param array  $data
     * @return $this
     */
    public function view($template, $data = [])
    {
        $html = ViewService::getEngine()->render($template, $data);
        $this->message->setBody($html, 'text/html');
        return $this;
    }

    /**
     * send mail
     *
     * @param string|array $to
     * @return array
     */
    public function send($to)
    {
        $this->message->setTo($to);
        $failers = [];
        $sent = $this->driver->send($this->message, $failers);
        return [$sent, $failers];
    }
}
