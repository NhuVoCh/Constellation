<?php declare(strict_types=1);

/**
 * MySQL database resources
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
 * MySQL database resources
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
 * @see       DB
 * @since     0.1.0
 */
class MySQL extends DB
{
  //
  // Static fields
  //

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

  //
  // Methods
  //

  /**
   * Connect to the database
   * Please do not forget to allow error mode with exception
   *
   * @param array $data Connection data
   *
   * @return bool
   */
  public function connect(array $data) : bool
  {
    $result = false;

    if (array_key_exists("hostname", $data) && array_key_exists("database", $data)) {
      try {
        $hostname = $data["hostname"];
        $database = $data["database"];
        $username = $data["username"] ?? $data["database"];
        $password = $data["password"] ?? "";
        $charset = $data["charset"] ?? "utf8mb4";
        $this->db = new \PDO("mysql:host={$hostname};dbname={$database};charset={$charset}", $username, $password);
        $result = true;
      } catch (\PDOException $e) {
        throw new ConstellationException("1501", 0, $e);
      }
    } else {
      throw new ConstellationException("1500");
    }

    return $result;
  }

  //
  // Getters, setters
  //
}
