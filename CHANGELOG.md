v3.1.5.1

- Fixed bug that prevented properties from listing all their values.

v3.1.4.3

- Fixed bug where metadata caches would not be removed.
- Feature.js property names are now stripped of '/' characters so they
  don't cause parser errors.
- Fixed bug where Feature Detection script would not be created in the core.js
  script.

v3.1.3.1

- Removed usage of the method DirectoryIterator::getExtension() in
  51Degrees_metadata.php as it is not available in PHP 5.3.5 and earlier.

v3.1.2.1

- Made improvements to the share usage script. It will now only send once per
  session.

v3.1.1.2

- Fixed a defect in the updater where it would download a data file with a newer
  version than supported which would then crash subsequent detections.

- Added a file, '51Degrees_update_logger.php'. This file will attempt a device
  data update and display the log and progress in a prettier form. This should
  only be used with vanilla installations, CMS plugins already have this
  functionality built into the plugin.

v3.1.0.1

- The 51Degrees device data file has been changed so that there are more
  internal lists that are ordered in a different way. That means that the
  detector is now much faster on certain useragents that feature a lot in other
  useragents.

v3.0.9.4

- The image width and height parameters have been changed to 'w' and 'h'.

- Added the $_fiftyone_degrees_default_auto attribute. If an image is
  requested with a width or height set to 'auto', the parameter will be
  changed to the value set in 'defaultAuto'. This change was made for
  clients without javascript that should still be served images, such
  as search crawlers. The attribute is optional and defaults to 50.

- The API no longer crashes when given a useragent that feature in many other
  useragents but is not used widely itself, ie 'Mozilla/4'.

- The 'DataFile' element in the $_51d array now says the datafile that was used
  rather than the one that was supposed to be used. This makes identifying
  broken file paths easier.

v3.0.8.3

- Changed to use system agnostic filepaths.

- Fixed issue where a fallback datafile name did not use a fully qualified path.

- The update script now specifies a timezone to prevent a warning from strtotime.

v3.0.7.2

- The API now supports PHP 5.3.

- Fixed a bug where boolean values were not being properly cast to boolean types.

v3.0.6.5

- Image optimiser has been given more configuration options to restrict the number
  of images that can be generated. The following 5 image options can now be
  configured in the 51Degrees.php file:

$_fiftyone_degrees_max_image_width: integer - determines the maximum width an
  image can be resized to. Aspect ratio will be retained if possible to do so.
$_fiftyone_degrees_max_image_height: integer - determines the maximum height an
  image can be resized too. Aspect ratio will be retained if possible to do so.
$_fiftyone_degrees_image_factor: integer - controls a factor that image height
  and width must be resized too. For instance, if
  $_fiftyone_degrees_image_factor is 2 then an image's height and width will be
  rounded down to the nearest size divisible by 2. This is too restrict images
  being made that are only very slightly different.
$_fiftyone_degrees_image_width_parameter:* string - controls the width query
  string used in the url that the image resizer responds to.
$_fiftyone_degrees_image_height_parameter:* string - controls the width query
  string used in the url that the image resizer responds to.  

*Note that if $_fiftyone_degrees_image_width_parameter or
$_fiftyone_degrees_image_height_parameter are changed from their default then
the new value must be placed in the FODIO constructor. For instance, if they're
changed to 'w' and 'h' then the FODIO constructor would be new FODIO('w', 'h');

- Added 51Degrees.features.js.php. Calling this script returns a javascript object
  of properties the requesting device supports.

- Renamed 51Degrees.js.php to 51Degrees.core.js.php. This is to align with other
  51Degrees APIs and to distinguish from 51Degrees.features.js.php.

- Metadata now has type information for device properties.

- Improved the metadata cache, so old caches are removed and there is no chance of
  one being used for the wrong data set.

- The data format has changed slightly to allow faster property value retrieval
  from properties in a future version.

- Data updates are now available. By placing a 51Degress .lic file in the
  51Degrees directory and requesting 51Degrees_Update.php the api attempts to get
  the latest data file and place it in the file location specified in
  51Degrees.php.

Fixed a bug where defer_execution = true was only being partially respected.

- Reworked image cache so there is no chance of a cache collision.

v3.0.3.0
- The alorithm now implements closest and nearest matching

- Closest matching has now been implemented.
- Another detection method termed Nearest has been added to the logic. The
  Nearest match method will return results for sub strings that are precisely
  present in the target user agent but offset by 1 or more characters. The
  signature with the lowest difference in sub string positions is returned. The
  method may not find a matching signature in which case the Closest match
  method is used.
- 6 new fields have been added to the Dataset header to assist the separate C
  routine in efficient memory allocation. They’re not used by the PHP API and
  can be ignored.
- The Closest and Nearest methods will no longer evaluate nodes that are known
  to match precisely to the signature being evaluated. This improves performance
  but does not impact accuracy.
- The Numeric method will no longer include nodes with numeric difference that
  overlap with nodes already found. This addresses a matching accuracy issue.
- In the Premium and Ultimate data sets useragents which contain Android but
  have not been precisely mapped to a specific hardware model will now be
  assigned to the Generic Android device.
  
Known Issues
- Optimising large images may cause Apache to crash with a memory exception.
  Apache should be allocated with more memory or smaller images should be used.

v3.0.1.0
- References to 'mobi' have been removed. Therefore, includes such as
  "require_once '51Degrees.mobi.php'" will need to be changed to
  "require_once '51Degrees.php'". Other file names have also been changed for
  consistency. The complete list of changed file names are:
  51Degrees.mobi.php -> 51Degrees.php
  51Degrees.mobi.metadata.php -> 51Degrees_metadata.php
  51Degrees.mobi.usage.php -> 51Degrees_usage.php
  51Degrees.mobi.js -> 51Degrees.js
  51Degrees.mobi_datareader.php -> 51Degrees_data_reader.php
  Filereader.php -> 51Degrees_file_reader.php

- The signature has changed so that there is no reference to the full byte array
  of the signature. When needed this information this information is now
  constructed from the nodes. The Closest match method has therefore changed to
  only compare the characters not contained in matched nodes and not the nodes
  that are known to match exactly or numerically. The PHP api does not yet
  implement these new changes to the closest match, so there will be varying
  detection results.

- The data structure of the Node in the data set has changed to provide the
  number of child nodes, numeric child nodes and signatures the node relates to
  before all of those lists. The means data is now only loaded when required,
  speeding up the detection.

Known Issues
- Matches using the 'closest' method may not return the same result as the other
  APIs, as PHP has not yet been updated to use the latest algorithm.

v3.0.0
- Initial Release
