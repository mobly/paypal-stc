<?php

namespace Mobly\PaypalStc\Sdk\Entities;

class Transaction extends AbstractEntity
{
    /**
     * @var Sender
     */
    protected $sender;

    /**
     * @var Receiver
     */
    protected $receiver;

    /**
     * @return Sender
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param Sender $sender
     * @return Transaction
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return Receiver
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param Receiver $receiver
     * @return Transaction
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
        return $this;
    }

}
