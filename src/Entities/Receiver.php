<?php

namespace Mobly\PaypalStc\Sdk\Entities;

class Receiver extends AbstractEntity
{
    /**
     * Unique identifier of the recipient’s account on the Mobly platform
     * @var string
     */
    protected $receiverAccountId;

    /**
     * Unique identifier of the recipient’s account on the Mobly platform
     * @var string
     */
    protected $receiverCreateDate;

    /**
     * Recipient’s phone number registered with the Mobly platform
     * @var string
     */
    protected $receiverEmail;

    /**
     * Recipient’s country code registered on the Mobly platform
     * @var string
     */
    protected $receiverAddressCountryCode;

    /**
     * Recipient’s state (or equivalent) registered on the Mobly platform
     * @var string
     */
    protected $receiverAddressState;

    /**
     * Recipient’s city registered on the Mobly platform
     * @var string
     */
    protected $receiverAddressCity;

    /**
     * Recipient’s postal code registered on the Mobly platform
     * @var string
     */
    protected $receiverAddressZip;

    /**
     * Recipient’s address information registered on the Mobly platform
     * @var string
     */
    protected $receiverAddressLine1;

    /**
     * Recipient’s secondary address details registered on the Mobly platform
     * @var string
     */
    protected $receiverAddressLine2;

    /**
     * Business name used by the seller to register on the marketplace platform
     * @var string
     */
    protected $businessName;

    /**
     * Transaction level vertical flag for the Mobly’s transactions that are in several verticals
     * @var string
     */
    protected $vertical;

    /**
     * The Mobly’s transaction is for tangible rather than digital goods.
     * @var boolean
     */
    protected $transactionIsTangible;

    /**
     * @var string
     * 0 = to be defined buyers
     * 1 = white list (trusted) buyers
     * 2 = black list (not trusted) buyers
     */
    protected $cdStringOne;

    /**
     * @return string
     */
    public function getReceiverAccountId()
    {
        return $this->receiverAccountId;
    }

    /**
     * @param $receiverAccountId
     * @return Receiver
     */
    public function setReceiverAccountId($receiverAccountId)
    {
        $this->receiverAccountId = $receiverAccountId;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiverCreateDate()
    {
        return $this->receiverCreateDate;
    }

    /**
     * @param $receiverCreateDate
     * @return Receiver
     */
    public function setReceiverCreateDate($receiverCreateDate)
    {
        $this->receiverCreateDate = $receiverCreateDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiverEmail()
    {
        return $this->receiverEmail;
    }

    /**
     * @param $receiverEmail
     * @return Receiver
     */
    public function setReceiverEmail($receiverEmail)
    {
        $this->receiverEmail = $receiverEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiverAddressCountryCode()
    {
        return $this->receiverAddressCountryCode;
    }

    /**
     * @param $receiverAddressCountryCode
     * @return Receiver
     */
    public function setReceiverAddressCountryCode($receiverAddressCountryCode)
    {
        $this->receiverAddressCountryCode = $receiverAddressCountryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiverAddressState()
    {
        return $this->receiverAddressState;
    }

    /**
     * @param $receiverAddressState
     * @return Receiver
     */
    public function setReceiverAddressState($receiverAddressState)
    {
        $this->receiverAddressState = $receiverAddressState;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiverAddressCity()
    {
        return $this->receiverAddressCity;
    }

    /**
     * @param $receiverAddressCity
     * @return Receiver
     */
    public function setReceiverAddressCity($receiverAddressCity)
    {
        $this->receiverAddressCity = $receiverAddressCity;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiverAddressZip()
    {
        return $this->receiverAddressZip;
    }

    /**
     * @param $receiverAddressZip
     * @return Receiver
     */
    public function setReceiverAddressZip($receiverAddressZip)
    {
        $this->receiverAddressZip = $receiverAddressZip;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiverAddressLine1()
    {
        return $this->receiverAddressLine1;
    }

    /**
     * @param $receiverAddressLine1
     * @return Receiver
     */
    public function setReceiverAddressLine1($receiverAddressLine1)
    {
        $this->receiverAddressLine1 = $receiverAddressLine1;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiverAddressLine2()
    {
        return $this->receiverAddressLine2;
    }

    /**
     * @param $receiverAddressLine2
     * @return Receiver
     */
    public function setReceiverAddressLine2($receiverAddressLine2)
    {
        $this->receiverAddressLine2 = $receiverAddressLine2;
        return $this;
    }

    /**
     * @return string
     */
    public function getBusinessName()
    {
        return $this->businessName;
    }

    /**
     * @param $businessName
     * @return Receiver
     */
    public function setBusinessName($businessName)
    {
        $this->businessName = $businessName;
        return $this;
    }

    /**
     * @return string
     */
    public function getVertical()
    {
        return $this->vertical;
    }

    /**
     * @param $vertical
     * @return Receiver
     */
    public function setVertical($vertical)
    {
        $this->vertical = $vertical;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTransactionIsTangible()
    {
        return $this->transactionIsTangible;
    }

    /**
     * @param $transactionIsTangible
     * @return $this
     */
    public function setTransactionIsTangible($transactionIsTangible)
    {
        $this->transactionIsTangible = $transactionIsTangible;
        return $this;
    }

    /**
     * @return string
     */
    public function getCdStringOne()
    {
        return $this->cdStringOne;
    }

    /**
     * @param $cdStringOne
     * @return Receiver
     */
    public function setCdStringOne($cdStringOne)
    {
        $this->cdStringOne = $cdStringOne;
        return $this;
    }
}
