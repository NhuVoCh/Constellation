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

  /**
   * Default constructor
   *
   * @param array $data Connection data
   */
  public function __construct(array $data = [])
  {
    if (count($data) > 0) {
      $this->connect($data);
    }
  }

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
  final public function query(string $sql, int $index = 0) : bool
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
  final public function prepare(string $sql, int $index = 0) : bool
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
   * @return bool
   */
  final public function execute(array $data = [], int $index = 0)
  {
    $result = false;

    if (!is_null($this->db)) {
      if (array_key_exists($index, $this->statements)) {
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

  /**
   * Get data from statement
   *
   * @param int $index Statement index
   *
   * @return mixed|null
   */
  final public function fetch(int $index = 0)
  {
    $result = null;

    if (!is_null($this->db)) {
      if (array_key_exists($index, $this->statements)) {
        $result = $this->statements[$index]->fetch(\PDO::FETCH_ASSOC);
      } else {
        throw new ConstellationException("1003");
      }
    } else {
      throw new ConstellationException("1000");
    }

    return $result;
  }

  /**
   * Get all data from statement
   *
   * @param int $index Statement index
   *
   * @return array|null
   */
  final public function fetchAll(int $index = 0)
  {
    $result = null;

    if (!is_null($this->db)) {
      if (array_key_exists($index, $this->statements)) {
        $result = [];
        while (($row = $this->statements[$index]->fetch(\PDO::FETCH_ASSOC)) !== false) {
          $result[] = $row;
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
   * Is database connected
   *
   * @return bool
   */
  final public function isConnected() : bool
  {
    return is_null($this->db);
  }

  /**
   * Get a stored statement
   *
   * @param int $index Statement index
   *
   * @return PDOStatement|null
   */
  final public function getStatement(int $index = 0) : ?\PDOStatement
  {
    return $this->statements[$index] ?? null;
  }
}
