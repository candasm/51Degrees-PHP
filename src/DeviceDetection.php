<?php

namespace Candasm\FiftyOneDegrees;

/**
 * Class DeviceDetection
 *
 * This class works same as old 51Degrees.php file.
 *
 * @package Candasm\FiftyOneDegrees
 */
/**
 * Class DeviceDetection
 *
 * @package Candasm\FiftyOneDegrees
 */
class DeviceDetection
{

    public function __construct()
    {
        $this->setDefaultConfiguration();
    }

    /**
     * Sets default configurations
     */
    protected function setDefaultConfiguration()
    {
        $this->setArrayCache(true);
        $this->setMaxImageWidth(0);
        $this->setMaxImageHeight(0);
        $this->setImageWidthParameter('w');
        $this->setImageHeightParameter('h');
        $this->setImageDefaultAuto(50);
        $this->setImageFactor(1);
    }

    /**
     * Controls if some objects are cached in an array. Objects are cached by default. Set to FALSE to disable.
     *
     * @param bool $arrayCache
     * @return void
     */
    public function setArrayCache($arrayCache = true)
    {
        global $_fiftyone_degrees_use_array_cache;
        $_fiftyone_degrees_use_array_cache = $arrayCache;
    }

    /**
     * Controls if property values are set to their typed values or strings.
     * Defaults to TRUE, set to FALSE to disable.
     *
     * @param bool $value
     * @return void
     */
    public function setReturnStrings($value = true)
    {
        global $_fiftyone_degrees_return_strings;
        $_fiftyone_degrees_return_strings = $value;
    }

    /**
     * Set 51 Degrees data file path that data is read from.
     *
     * @param string $path
     * @return void
     */
    public function setDataFilePath($path = null)
    {
        global $_fiftyone_degrees_data_file_path;
        $_fiftyone_degrees_data_file_path = $path;
    }

    /**
     * If TRUE detection functions are not called automatically by including this
     * script, they have to be called explicitly.
     *
     * @param bool $value
     * @return void
     */
    public function setDeferExecution($value = true)
    {
        global $_fiftyone_degrees_defer_execution;
        $_fiftyone_degrees_defer_execution = $value;
    }

    /**
     * Controls which property values should be returned from detection.
     * Greater performance can be gained from a restricted list of properties.
     * By default all values are returned.
     *
     * @example array('IsMobile', 'HardwareModel', 'PlatformName', 'BrowserName')
     *
     * @param array $properties
     * @retun void
     */
    public function setProperties(array $properties = [])
    {
        global $_fiftyone_degrees_needed_properties;
        $_fiftyone_degrees_needed_properties = $properties;
    }

    /**
     * Controls the maximum width an image can be resized too. This can be used to
     * control server load if many images are being processed. Set to 0 to have no
     * limit.
     *
     * @param int $value
     * @return void
     */
    public function setMaxImageWidth($value = 0)
    {
        global $_fiftyone_degrees_max_image_width;
        $_fiftyone_degrees_max_image_width = $value;
    }

    /**
     * Controls the maximum height an image can be resized too. This can be used to
     * control server load if many images are being processed. Set to 0 to have no
     * limit.
     *
     * @param int $value
     * @return void
     */
    public function setMaxImageHeight($value = 0)
    {
        global $_fiftyone_degrees_max_image_height;
        $_fiftyone_degrees_max_image_height = $value;
    }

    /**
     * Specifies what the width parameter should be for an optimised image url.
     * Defaults to 'w'.
     *
     * @param string $value
     * @return void
     */
    public function setImageWidthParameter($value = 'w')
    {
        global $_fiftyone_degrees_image_width_parameter;
        $_fiftyone_degrees_image_width_parameter = $value;
    }

    /**
     * Specifies what the height parameter should be for an optimised image url.
     * Defaults to 'h'.
     *
     * @param string $value
     * @return void
     */
    public function setImageHeightParameter($value = 'h')
    {
        global $_fiftyone_degrees_image_height_parameter;
        $_fiftyone_degrees_image_height_parameter = $value;
    }

    /**
     * If an image is requested with a width or height set to 'auto', the
     * parameter will be changed to the value set in 'defaultAuto'. This is most
     * useful for clients without javascript that should still be served images,
     * Defaults to 50.
     *
     * @param int $value
     * @return void
     */
    public function setImageDefaultAuto($value = 50)
    {
        global $_fiftyone_degrees_default_auto;
        $_fiftyone_degrees_default_auto = $value;
    }

    /**
     * Sets a factor images dimensions must have. Image sizes are rounded down to
     * nearest multiple. This can be used to control server load if many images are
     * being processed.
     *
     * @param int $value
     * @return void
     */
    public function setImageFactor($value = 1)
    {
        global $_fiftyone_degrees_image_factor;
        $_fiftyone_degrees_image_factor = $value;
    }

    /**
     * Returns array of properties associated with the device.
     *
     * @return array
     */
    public function getDeviceData()
    {
        global $_51d;
        $_51d = [];
        if ((isset($_fiftyone_degrees_defer_execution) &&
                $_fiftyone_degrees_defer_execution === true) === false) {
            global $_51d;
            $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null;
            $_51d = fiftyone_degrees_get_device_data($userAgent);
        }

        return $_51d;
    }

    /**
     * Returns an array with properties in the data set and their values.
     *
     * @return array
     */
    public function getMetadata()
    {
        return fiftyone_degrees_get_meta_data();
    }
}
