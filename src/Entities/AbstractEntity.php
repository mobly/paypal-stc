<?php


namespace Mobly\PaypalStc\Sdk\Entities;

use Mobly\PaypalStc\Sdk\Utility\UString;

class AbstractEntity
{
    /**
     * @return array
     */
    public function toArray()
    {
        return $this->objectToArray(get_object_vars($this), false);
    }

    /**
     * @param $obj
     * @param bool $keepNullProperties
     * @return array
     */
    protected function objectToArray($obj, $keepNullProperties = true) {
        $arrObj = is_object($obj) ? get_object_vars($obj) : $obj;

        $arr = [];

        foreach ($arrObj as $key => $val) {
            $val = (is_array($val) || is_object($val)) ? $this->objectToArray($val, $keepNullProperties) : $val;
            if ($keepNullProperties || $val !== null) {
                $val = ($val === null) ? $val = '' : $val;
                $arr[UString::uncamelize($key)] = is_scalar($val) ? ((string) $val) : $val;
            }
        }
        return $arr;
    }
}