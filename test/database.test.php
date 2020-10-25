<?php declare(strict_types=1);

/**
 * Unit tests for databases
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
 * Unit tests for databases
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
final class DatabaseTest extends TestCase
{
  /// MySQL database hostname
  private const _MYSQL_HOSTNAME = "localhost";

  /// MySQL database username
  private const _MYSQL_USERNAME = "constellation";

  /// MySQL database password
  private const _MYSQL_PASSWORD = "constellation";

  /// MySQL database name
  private const _MYSQL_DATABASE = "constellation";

  /// MySQL database charset
  private const _MYSQL_CHARSET = "utf8mb4";

  /// PostgreSQL database hostname
  private const _POSTGRESQL_HOSTNAME = "localhost";

  /// PostgreSQL database username
  private const _POSTGRESQL_USERNAME = "constellation";

  /// PostgreSQL database password
  private const _POSTGRESQL_PASSWORD = "constellation";

  /// PostgreSQL database name
  private const _POSTGRESQL_DATABASE = "constellation";

  /// PostgreSQL database charset
  private const _POSTGRESQL_CHARSET = "utf8";

  /// SQLite database database file
  private const _SQLITE_DATABASE = __DIR__ . DIRECTORY_SEPARATOR . "test.db";

  /// MySQL database resources
  private $_mysql = null;

  /// PostgreSQL database resources
  private $_postgresql = null;

  /// SQLite database resources
  private $_sqlite = null;

  /**
   * Connect to database
   *
   * @return void
   */
  private function _connect() : void
  {
    $mysql_connection = [
      "hostname" => static::_MYSQL_HOSTNAME,
      "username" => static::_MYSQL_USERNAME,
      "password" => static::_MYSQL_PASSWORD,
      "database" => static::_MYSQL_DATABASE,
      "charset" => static::_MYSQL_CHARSET,
    ];

    $postgresql_connection = [
      "hostname" => static::_POSTGRESQL_HOSTNAME,
      "username" => static::_POSTGRESQL_USERNAME,
      "password" => static::_POSTGRESQL_PASSWORD,
      "database" => static::_POSTGRESQL_DATABASE,
      "charset" => static::_POSTGRESQL_CHARSET,
    ];

    $sqlite_connection = [
      "database" => static::_SQLITE_DATABASE,
    ];

    try {
      $this->_mysql = new MySQL($mysql_connection);
    } catch (\ConstellationException $e) {
      $this->fail();
    }

    try {
      $this->_postgresql = new PostgreSQL($postgresql_connection);
    } catch (\ConstellationException $e) {
      $this->fail();
    }

    try {
      $this->_sqlite = new SQLite($sqlite_connection);
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
