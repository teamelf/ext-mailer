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

use TeamELF\Database\AbstractModel;

/**
 * @Entity
 * @Table(name="mailer")
 */
class Mailer extends AbstractModel
{
    // ----------------------------------------
    // | ORM DEFINITIONS

    /**
     * @var boolean
     *
     * @Column(name="`default`", type="boolean", nullable=TRUE)
     */
    protected $default;

    /**
     * @var string
     *
     * @Column(type="string", length=50, nullable=TRUE)
     */
    protected $remark;

    /**
     * @var string
     *
     * @Column(type="string", length=10)
     */
    protected $driver;

    /**
     * @var string
     *
     * @Column(type="string", length=30)
     */
    protected $host;

    /**
     * @var integer
     *
     * @Column(type="integer")
     */
    protected $port;

    /**
     * @var string
     *
     * @Column(type="string", length=10)
     */
    protected $encryption;

    /**
     * @var string
     *
     * @Column(type="string", length=100)
     */
    protected $username;

    /**
     * @var string
     *
     * @Column(type="string", length=100)
     */
    protected $password;

    /**
     * @var string
     *
     * @Column(type="string", length=100)
     */
    protected $sender;

    // ----------------------------------------
    // | GETTERS & SETTERS

    /**
     * getter of $default
     *
     * @return bool
     */
    public function getDefault()
    {
        return !!$this->default;
    }

    /**
     * setter of $default
     *
     * @param boolean $default
     * @return $this
     */
    public function default(bool $default)
    {
        $this->default = !!$default;
        return $this;
    }

    /**
     * getter of $remark
     *
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * setter of $remark
     *
     * @param string $remark
     * @return $this
     */
    public function remark($remark)
    {
        $this->remark = $remark;
        return $this;
    }

    /**
     * getter of $driver
     *
     * @return string
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * setter of $driver
     *
     * @param string $driver
     * @return $this
     */
    public function driver($driver)
    {
        $this->driver = $driver;
        return $this;
    }

    /**
     * getter of $host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * setter of $host
     *
     * @param string $host
     * @return $this
     */
    public function host($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * getter of $port
     *
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * setter of $port
     *
     * @param int $port
     * @return $this
     */
    public function port(int $port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * getter of $encryption
     *
     * @return string
     */
    public function getEncryption()
    {
        return $this->encryption;
    }

    /**
     * setter of $encryption
     *
     * @param string $encryption
     * @return $this
     */
    public function encryption($encryption)
    {
        $this->encryption = $encryption;
        return $this;
    }

    /**
     * getter of $username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * setter of $username
     *
     * @param string $username
     * @return $this
     */
    public function username($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * getter of $password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * setter of $password
     *
     * @param string $password
     * @return $this
     */
    public function password($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * getter of $sender
     *
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * setter of $sender
     *
     * @param string $sender
     * @return $this
     */
    public function sender($sender)
    {
        $this->sender = $sender;
        return $this;
    }

    // ----------------------------------------
    // | HELPER FUNCTIONS
}
