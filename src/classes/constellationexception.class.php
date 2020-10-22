<?php declare(strict_types=1);

/**
 * Constellation exception
 *
 * PHP Version 7.3, 7.4
 *
 * @category  Library
 * @package   Constellation
 * @author    Nhu-Hoai Robet Vo <nhuhoai.vo@nhuvo.ch>
 * @copyright 2020 Nhu-Hoai Robert Vo
 * @license   https://opensource.org/licenses/MIT MIT License
 * @version   GIT: 0.1.0
 * @link      https://github.com/NhuVoCh/Constellation/
 * @since     0.1.0
 */

namespace NhuVo\Constellation;

/**
 * Constellation exception
 *
 * PHP Version 7.3, 7.4
 *
 * @category  Library
 * @package   Constellation
 * @author    Nhu-Hoai Robet Vo <nhuhoai.vo@nhuvo.ch>
 * @copyright 2020 Nhu-Hoai Robert Vo
 * @license   https://opensource.org/licenses/MIT MIT License
 * @version   Release: 0.1.0
 * @link      https://github.com/NhuVoCh/Constellation/
 * @since     0.1.0
 */
final class ConstellationException extends \Exception
{
  //
  // Static fields
  //

  protected const EXCEPTIONS = [
    // 0 to 999, global exceptions
    0 => "Unknown exception",
    1 => "Missing constants",
    2 => "Missing autoloader",
    3 => "Missing constellation object",
    4 => "Missing project object",
    5 => "Missing project classes directory constant",
    6 => "Cannot load object",

    // 1000 to 1999, database exceptions
  ];

  //
  // Static magic methods
  //

  //
  // Static methods
  //

  //
  // Fields
  //

  //
  // Constructor, magic methods
  //

  /**
   * Override the constructor
   *
   * @param string    $message  Please insert the error code
   * @param int       $code     Not use, please insert whatever
   * @param Throwable $previous Previous throwable
   */
  public function __construct(string $message = "", int $code = 0, \Throwable $previous = null)
  {
    $code = intval($message);

    if (!array_key_exists($code, ConstellationException::EXCEPTIONS)) {
      $code = 0;
    }

    parent::__construct(ConstellationException::EXCEPTIONS[$code], $code, $previous);
  }

  //
  // Methods
  //

  //
  // Getters, setters
  //
}
