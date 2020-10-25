<?php declare(strict_types=1);

/**
 * Autoloader class
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

spl_autoload_register(
    function ($classname) {
      $classpath = explode("\\", $classname);
      $classshortname = strtolower(array_pop($classpath));
      $classfile = "";

      if (strpos($classname, __NAMESPACE__) === 0) {
        if (file_exists(CORE_CLASSES . $classshortname . ".class.php")) {
          $classfile = CORE_CLASSES . $classshortname . ".class.php";
        } elseif (file_exists(CORE_CLASSES . $classshortname . ".interface.php")) {
          $classfile = CORE_CLASSES . $classshortname . ".interface.php";
        } elseif (file_exists(CORE_CLASSES . $classshortname . ".trait.php")) {
          $classfile = CORE_CLASSES . $classshortname . ".trait.php";
        } else {
          throw new ConstellationException("3");
        }
      } elseif (defined("CLASSES")) {
        if (file_exists(CLASSES . $classshortname . ".class.php")) {
          $classfile = CLASSES . $classshortname . ".class.php";
        } elseif (file_exists(CLASSES . $classshortname . ".interface.php")) {
          $classfile = CLASSES . $classshortname . ".interface.php";
        } elseif (file_exists(CLASSES . $classshortname . ".trait.php")) {
          $classfile = CLASSES . $classshortname . ".trait.php";
        } else {
          throw new ConstellationException("4");
        }
      } else {
        if ($classpath[0] != "PHPUnit") {
          throw new ConstellationException("5");
        }
      }

      if ($classpath[0] != "PHPUnit" && (@include_once $classfile) === false) {
        throw new ConstellationException("6");
      }
    }
);
