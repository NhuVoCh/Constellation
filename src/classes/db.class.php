<?php declare(strict_types=1);

/**
 * Database object
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
 * Database object
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
abstract class DB
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

  /// Database resources
  protected $db = null;

  /// Statements list
  protected $statements = [];

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
  abstract public function connect(array $data) : bool;

  /**
   * Execute an SQL script
   *
   * @param string $sql   SQL script
   * @param int    $index Statement index
   *
   * @return bool
   */
  public function query(string $sql, int $index = 0) : bool
  {
    $result = false;

    if (!is_null($this->db)) {
      try {
        $statement = $this->db->query($sql);
        $this->statements[$index] = $statement;
        $result = true;
      } catch (\PDOException $e) {
        throw new ConstellationException("1001", 0, $e);
      }
    } else {
      throw new ConstellationException("1000");
    }

    return $result;
  }

  /**
   * Prepare an SQL script
   *
   * @param string $sql   SQL script
   * @param int    $index Statement index
   *
   * @return bool
   */
  public function prepare(string $sql, int $index = 0) : bool
  {
    $result = false;

    if (!is_null($this->db)) {
      try {
        $statement = $this->db->prepare($sql);
        $this->statements[$index] = $statement;
        $result = true;
      } catch (\PDOException $e) {
        throw new ConstellationException("1002", 0, $e);
      }
    } else {
      throw new ConstellationException("1000");
    }

    return $result;
  }

  /**
   * Execute a prepared script
   *
   * @param array $data  Connection data
   * @param int   $index Statement index
   *
   * @return mixed
   */
  public function execute(array $data = [], int $index = 0)
  {
    $result = null;

    if (!is_null($this->db)) {
      if (array_key_exists($index, ConstellationException::EXCEPTIONS)) {
        try {
          $result = $this->statemtents[$index]->execute($data);
        } catch (\PDOException $e) {
          throw new ConstellationException("1004", 0, $e);
        }
      } else {
        throw new ConstellationException("1003");
      }
    } else {
      throw new ConstellationException("1000");
    }

    return $result;
  }

  //
  // Getters, setters
  //

  /**
   * Get a stored statement
   *
   * @param int $index Statement index
   *
   * @return PDOStatement|null
   */
  public function getStatement(int $index = 0) : ?\PDOStatement
  {
    return $this->statements[$index] ?? null;
  }
}
