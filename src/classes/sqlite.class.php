<?php declare(strict_types=1);

/**
 * SQLite database resources
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
 * @see       DB
 * @since     0.1.0
 */

namespace NhuVo\Constellation;

/**
 * SQLite database resources
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
class SQLite extends DB
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

    if (array_key_exists("database", $data)) {
      try {
        $database = $data["database"];
        $this->db = new \PDO("sqlite:{$database}");
        $result = true;
      } catch (\PDOException $e) {
        throw new ConstellationException("1601", 0, $e);
      }
    } else {
      throw new ConstellationException("1600");
    }

    return $result;
  }

  //
  // Getters, setters
  //
}
