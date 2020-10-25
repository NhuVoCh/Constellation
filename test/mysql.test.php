<?php declare(strict_types=1);

/**
 * Unit tests for MySQL object
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

use PHPUnit\Framework\TestCase;

/**
 * Unit tests for MySQL object
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
final class MySQLTest extends TestCase
{
  /// Database hostname
  private const _MYSQL_HOSTNAME = "localhost";

  /// Database username
  private const _MYSQL_USERNAME = "constellation";

  /// Database password
  private const _MYSQL_PASSWORD = "constellation";

  /// Database name
  private const _MYSQL_DATABASE = "constellation";

  /// Database charset
  private const _MYSQL_CHARSET = "utf8mb4";

  /// MySQL database resources
  private $_db = null;

  /**
   * Connect to database
   *
   * @return void
   */
  private function _connect() : void
  {
    $data = [
      "hostname" => static::_MYSQL_HOSTNAME,
      "username" => static::_MYSQL_USERNAME,
      "password" => static::_MYSQL_PASSWORD,
      "database" => static::_MYSQL_DATABASE,
      "charset" => static::_MYSQL_CHARSET,
    ];
    try {
      $_db = new MySQL($data);
    } catch (\ConstellationException $e) {
      $this->fail();
    }
  }

  /**
   * Test connection method
   *
   * @test testConnect
   *
   * @return void
   */
  public function testConnect() : void
  {
    $this->_connect();
    $this->assertTrue(true);
  }
}
