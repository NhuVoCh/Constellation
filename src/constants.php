<?php declare(strict_types=1);

/**
 * Constellation constants
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

/// Directory separator character
define("NhuVo\\Constellation\\DS", DIRECTORY_SEPARATOR);

/// Constellation directory path
define("NhuVo\\Constellation\\CORE", __DIR__ . DS);

/// Constellation classes directory path
define("NhuVo\\Constellation\\CORE_CLASSES", CORE . "classes" . DS);
