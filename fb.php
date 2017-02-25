<?php
/**
 * ***** BEGIN LICENSE BLOCK *****
 *
 * [MIT License](http://www.opensource.org/licenses/mit-license.php)
 *
 * Copyright (c) 2017+ [Iurii Bell](http://www.bel-tech.ru/)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * ***** END LICENSE BLOCK *****
 *
 * @copyright   Copyright (C) 2017+ 
 * @author      Bell
 * @license     MIT
 * @package     FirePHP
 */

if (!class_exists('ChromePhp', false)) {
    require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'ChromePhp.php';
}

ChromePhp::getInstance()->addSetting(ChromePhp::BACKTRACE_LEVEL, 3);
/**
 * Sends the given data to the FirePHP Firefox Extension.
 * The data can be displayed in the Firebug Console or in the
 * "Server" request tab.
 *
 * @see  http://firephp.bel-tech.ru
 * @param mixed $Object
 * @return true
 * @throws Exception
 */
function fb()
{
    $instance = ChromePhp::getInstance(true);
    $args = func_get_args();
    if ( count($args) == 1) $args = reset($args);
    return FB::send(ChromePhp::LOG, $args);
    //return call_user_func_array(array($instance, 'log'), $args);
}
class FB
{


    /**
     * Flag to enable/disable logging
     *
     * @var boolean
     */
    protected static $enabled = true;

    /**
     * Set an Insight console to direct all logging calls to
     *
     * @param object $console The console object to log to
     * @return void
     */
    public static function setLogToInsightConsole($console)
    {
        //FirePHP::getInstance(true)->setLogToInsightConsole($console);
    }
    /**
     * Enable and disable logging to Firebug
     *
     * @see FirePHP->setEnabled()
     * @param boolean $enabled TRUE to enable, FALSE to disable
     * @return void
     */
    public static function setEnabled($enable)
    {
        self::$enabled = $enable;
    }

    /**
     * Check if logging is enabled
     *
     * @see FirePHP->getEnabled()
     * @return boolean TRUE if enabled
     */
    public static function getEnabled()
    {
        return self::$enabled;
    }

    /**
     * Specify a filter to be used when encoding an object
     *
     * Filters are used to exclude object members.
     *
     * @see FirePHP->setObjectFilter()
     * @param string $class The class name of the object
     * @param array $filter An array or members to exclude
     * @return void
     */
    public static function setObjectFilter($class, $filter)
    {
       //FirePHP::getInstance(true)->setObjectFilter($class, $filter);
    }

    /**
     * Set some options for the library
     *
     * @see FirePHP->setOptions()
     * @param array $options The options to be set
     * @return void
     */
    public static function setOptions($options)
    {
        ChromePhp::getInstance()->setSettings($options);
    }
    /**
     * Get options for the library
     *
     * @see FirePHP->getOptions()
     * @return array The options
     */
    public static function getOptions()
    {
        return ChromePhp::getInstance()->getSettings();
    }
    /**
     * Log object to firebug
     *
     * @see 
     * @param mixed $object
     * @return true
     * @throws Exception
     */
    public static function send()
    {
        if (!self::$enabled) return false;
        $args = func_get_args();
        return call_user_func_array(array(ChromePhp::getInstance(), $args[0] ), $args);
    }
    /**
     * Start a group for following messages
     *
     * Options:
     *   Collapsed: [true|false]
     *   Color:     [#RRGGBB|ColorName]
     *
     * @param string $name
     * @param array $options OPTIONAL Instructions on how to log the group
     * @return true
     */
    public static function group()
    {
        $args = func_get_args();
        return self::send(ChromePhp::GROUP,$args);

        //return ChromePhp::getInstance()->group(ChromePhp::GROUP_END,$name, $options);
    }
    /**
     * Ends a group you have started before
     *
     * @return true
     * @throws Exception
     */
    public static function groupEnd()
    {
        return self::send(ChromePhp::GROUP_END );
    }
    /**
     * Log object with label to firebug console
     *
     * @see FirePHP::LOG
     * @param mixed $object
     * @param string $label
     * @return true
     * @throws Exception
     */
    public static function log($object, $label=null)
    {
        return self::send( ChromePhp::LOG, $object);
    }
    /**
     * Log object with label to firebug console
     *
     * @see FirePHP::INFO
     * @param mixed $object
     * @param string $label
     * @return true
     * @throws Exception
     */
    public static function info($object, $label=null)
    {
        return self::send(ChromePhp::INFO, $object);
    }
    /**
     * Log object with label to firebug console
     *
     * @see FirePHP::WARN
     * @param mixed $object
     * @param string $label
     * @return true
     * @throws Exception
     */
    public static function warn($object, $label=null)
    {
        return self::send(ChromePhp::WARN, $object);
    }
    /**
     * Log object with label to firebug console
     *
     * @see FirePHP::ERROR
     * @param mixed $object
     * @param string $label
     * @return true
     * @throws Exception
     */
    public static function error($object, $label=null)
    {
        return self::send(ChromePhp::ERROR, $object);
    }
    /**
     * Dumps key and variable to firebug server panel
     *
     * @see FirePHP::DUMP
     * @param string $key
     * @param mixed $variable
     * @return true
     * @throws Exception
     */
    public static function dump($key, $variable)
    {
        return self::send(ChromePhp::LOG, $variable, $key );
    }

    /**
     * Set settings a trace in the firebug console
     *
     * @see FirePHP::TRACE
     * @param string $label
     * @return true
     * @throws Exception
     */
    public static function settings()
    {
        $args = func_get_args();
        if ( count($args) == 1  && ( gettype($args[0]) == 'string' ) ){
            return ChromePhp::getInstance()->getSetting($args[0]);    
        }elseif(  gettype($args[0]) == 'array' ){
            return ChromePhp::getInstance()->setSetting($args[0]);    
        }elseif(  count($args) == 2  ){
            return ChromePhp::getInstance()->setSetting($args[0],$args[1]); 
        }
        return false;
    }

    /**
     * Log a trace in the firebug console
     *
     * @see FirePHP::TRACE
     * @param string $label
     * @return true
     * @throws Exception
     */
    public static function trace($type = ChromePhp::TABLE)
    {
        return self::send( $type, debug_backtrace() );
    }
    
    /**
     * Log a table in the firebug console
     *
     * @see FirePHP::TABLE
     * @param string $label
     * @param string $table
     * @return true
     * @throws Exception
     */
    public static function table($label, $table = null)
    {
        if ( $table === null ) $table = $label;
        return self::send(ChromePhp::TABLE, $table );
    }
}
