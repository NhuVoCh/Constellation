<?php declare(strict_types=1);

/**
 * Unit tests bootstrap file
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

$ds = DIRECTORY_SEPARATOR;
$testDirectory = __DIR__ . $ds;
$sourceDirectory = __DIR__ . $ds . ".." . $ds . "src" . $ds;

require_once $sourceDirectory . "constellation.php";
