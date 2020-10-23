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
    // 1000 to 1499, global database exceptions
    1000 => "Database not connected",
    1001 => "SQL script execution failed",
    1002 => "SQL script preparation failed",
    1003 => "Missing statement",
    1004 => "SQL script failed on prepared statement execution",

    // 1500 to 1599, mysql database exceptions
    1500 => "Missing required data for MySQL connection",
    1501 => "Error while connecting to MySQL database",

    // 1600 to 1699, sqlite database exceptions
    1600 => "Missing required data for SQLite connection",
    1601 => "Error while connecting to SQLite database",

    // 1700 to 1799, postgresql database exceptions
    1700 => "Missing required data for PostgreSQL connection",
    1701 => "Error while connecting to PostgreSQL database",
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
