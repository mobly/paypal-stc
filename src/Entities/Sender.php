<?php
namespace Mobly\PaypalStc\Sdk\Entities;

class Sender extends AbstractEntity
{
    /**
     * Unique identifier of the buyer account on the Mobly platform
     * @var string
     */
    protected $senderAccountId;

    /**
     * First name registered with the buyer’s Mobly account
     * @var string
     */
    protected $senderFirstName;

    /**
     * Last name registered with the buyer’s Mobly account
     * @var string
     */
    protected $senderLastName;

    /**
     * Email address registered with the buyer’s Mobly account
     * @var string
     */
    protected $senderEmail;

    /**
     * Phone number registered with the buyer’s Mobly account
     * @var string
     */
    protected $senderPhone;

    /**
     * Country code registered with the buyer’s Mobly account
     * @var string
     */
    protected $senderCountryCode;

    /**
     * State (or equivalent) of the buyer registered on the Mobly platform
     * @var string
     */
    protected $senderAddressState;

    /**
     * City of the buyer registered on the Mobly platform
     * @var string
     */
    protected $senderAddressCity;

    /**
     * Postal code of the buyer registered on the Mobly platform
     * @var string
     */
    protected $senderAddressZip;

    /**
     * Address details of the buyer registered on the Mobly platform
     * @var string
     */
    protected $senderAddressLine1;

    /**
     * Secondary address details of the buyer registered on the Mobly platform
     * @var string
     */
    protected $senderAddressLine2;

    /**
     * Date of creation of the buyer’s account on the Mobly platform
     * @var string
     */
    protected $senderCreateDate;

    /**
     * IP address that the buyer used to sign up on the Mobly platform
     * @var string
     */
    protected $senderSignupId;

    /**
     * @var string
     */
    protected $senderTaxId;

    /**
     * @return string
     */
    public function getSenderAccountId()
    {
        return $this->senderAccountId;
    }

    /**
     * @param string $senderAccountId
     * @return Sender
     */
    public function setSenderAccountId($senderAccountId)
    {
        $this->senderAccountId = $senderAccountId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderFirstName()
    {
        return $this->senderFirstName;
    }

    /**
     * @param string $senderFirstName
     * @return Sender
     */
    public function setSenderFirstName($senderFirstName)
    {
        $this->senderFirstName = $senderFirstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderLastName()
    {
        return $this->senderLastName;
    }

    /**
     * @param string $senderLastName
     * @return Sender
     */
    public function setSenderLastName($senderLastName)
    {
        $this->senderLastName = $senderLastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderEmail()
    {
        return $this->senderEmail;
    }

    /**
     * @param string $senderEmail
     * @return Sender
     */
    public function setSenderEmail($senderEmail)
    {
        $this->senderEmail = $senderEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderPhone()
    {
        return $this->senderPhone;
    }

    /**
     * @param string $senderPhone
     * @return Sender
     */
    public function setSenderPhone($senderPhone)
    {
        $this->senderPhone = $senderPhone;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderCountryCode()
    {
        return $this->senderCountryCode;
    }

    /**
     * @param string $senderCountryCode
     * @return Sender
     */
    public function setSenderCountryCode($senderCountryCode)
    {
        $this->senderCountryCode = $senderCountryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderAddressState()
    {
        return $this->senderAddressState;
    }

    /**
     * @param string $senderAddressState
     * @return Sender
     */
    public function setSenderAddressState($senderAddressState)
    {
        $this->senderAddressState = $senderAddressState;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderAddressCity()
    {
        return $this->senderAddressCity;
    }

    /**
     * @param string $senderAddressCity
     * @return Sender
     */
    public function setSenderAddressCity($senderAddressCity)
    {
        $this->senderAddressCity = $senderAddressCity;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderAddressZip()
    {
        return $this->senderAddressZip;
    }

    /**
     * @param string $senderAddressZip
     * @return Sender
     */
    public function setSenderAddressZip($senderAddressZip)
    {
        $this->senderAddressZip = $senderAddressZip;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderAddressLine1()
    {
        return $this->senderAddressLine1;
    }

    /**
     * @param string $senderAddressLine1
     * @return Sender
     */
    public function setSenderAddressLine1($senderAddressLine1)
    {
        $this->senderAddressLine1 = $senderAddressLine1;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderAddressLine2()
    {
        return $this->senderAddressLine2;
    }

    /**
     * @param string $senderAddressLine2
     * @return Sender
     */
    public function setSenderAddressLine2($senderAddressLine2)
    {
        $this->senderAddressLine2 = $senderAddressLine2;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderCreateDate()
    {
        return $this->senderCreateDate;
    }

    /**
     * @param $senderCreateDate
     * @return Sender
     */
    public function setSenderCreateDate($senderCreateDate)
    {
        $this->senderCreateDate = $senderCreateDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderSignupId()
    {
        return $this->senderSignupId;
    }

    /**
     * @param string $senderSignupId
     * @return Sender
     */
    public function setSenderSignupId($senderSignupId)
    {
        $this->senderSignupId = $senderSignupId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderTaxId()
    {
        return $this->senderTaxId;
    }

    /**
     * @param string $senderTaxId
     * @return Sender
     */
    public function setSenderTaxId($senderTaxId)
    {
        $this->senderTaxId = $senderTaxId;
        return $this;
    }
}
