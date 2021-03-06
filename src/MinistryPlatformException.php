<?php namespace Blackpulp\MinistryPlatform;

/**
 * MinistryPlatform Exception handling
 * 
 * @author Ken Mulford <ken@blackpulp.com>
 * @category MinistryPlatform
 * @version  1.0
 */

/**
 * This class handles exceptions for MinistryPlatform errors.
 */
class MinistryPlatformException extends \Exception {

  /**
   * A generic override for throwing Exceptions from MP.
   *
   * @var string $message
   */
  protected $message = "There was an error involving the MinistryPlatform API.";

  /**
   * Store the error code.
   * 
   * MinistryPlatform's Add/Update record calls do provide
   * an error code. If it's passed, we'll send it along
   * to the exception.
   * 
   * @var int
   */
  protected $code;

  /**
   * Initialize the Exception object.
   * 
   * @param string  $message
   * @param integer $code
   */
  public function __construct($message, $code=0) {

    $this->message = $message;
    $this->code = $code;

  }

}