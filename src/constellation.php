<?php declare(strict_types=1);

/**
 * Constellation project
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

$constants = __DIR__ . DIRECTORY_SEPARATOR . "constants.php";
if (!file_exists($constants) || (include_once $constants) === false) {
  die("Fatal error #1");
}

$autoload = CORE . "autoload.php";
if (!file_exists($autoload) || (include_once $autoload) === false) {
  die("Fatal error #2");
}
