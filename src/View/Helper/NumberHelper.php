<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
  * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
  *
  * Licensed under The MIT License
  * For full copyright and license information, please see the LICENSE.txt
  * Redistributions of files must retain the above copyright notice.
  *
  * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
  * @link          http://cakephp.org CakePHP(tm) Project
  * @since         0.10.0
  * @license       http://www.opensource.org/licenses/mit-license.php MIT License
  */
 namespace Cake\View\Helper;

 use Cake\Core\App;
 use Cake\Core\Exception\Exception;
 use Cake\View\Helper;
 use Cake\View\View;

 /**
  * Number helper library.
  *
  * Methods to make numbers more readable.
  *
  * @link http://book.cakephp.org/3.0/en/views/helpers/number.html
  * @see \Cake\I18n\Number
  */
 class NumberHelper extends Helper
{

     /**
      * Default config for this class
      *
      * @var mixed
      */
     protected $_defaultConfig = [
        'engine' => 'Cake\I18n\Number'
     ];

     /**
    43:      * Cake\I18n\LocalizedNumber instance
    44:      *
    45:      * @var \Cake\I18n\Number
    46:      */
     protected $_engine = null;

     /**
    50:      * Default Constructor
    51:      *
    52:      * ### Settings:
    53:      *
    54:      * - `engine` Class name to use to replace Cake\I18n\Number functionality
    55:      *            The class needs to be placed in the `Utility` directory.
    56:      *
    57:      * @param \Cake\View\View $View The View this helper is being attached to.
    58:      * @param array $config Configuration settings for the helper
    59:      * @throws \Cake\Core\Exception\Exception When the engine class could not be found.
    60:      */
     public function __construct(View $View, array $config = [])
    {
         parent::__construct($View, $config);

         $config = $this->_config;

         $engineClass = App::className($config['engine'], 'Utility');
         if ($engineClass) {
             $this->_engine = new $engineClass($config);
         } else {
             throw new Exception(sprintf('Class for %s could not be found', $config['engine']));
        }
    }

    /**
    76:      * Call methods from Cake\I18n\Number utility class
    77:      *
    78:      * @param string $method Method to invoke
    79:      * @param array $params Array of params for the method.
    80:      * @return mixed Whatever is returned by called method, or false on failure
    81:      */
    public function __call($method, $params)
     {
         return call_user_func_array([$this->_engine, $method], $params);
     }

     /**
    88:      * Formats a number with a level of precision.
    89:      *
    90:      * @param float $number A floating point number.
    91:      * @param int $precision The precision of the returned number.
    92:      * @return float Formatted float.
    93:      * @see \Cake\I18n\Number::precision()
    94:      * @link http://book.cakephp.org/3.0/en/views/helpers/number.html#formatting-floating-point-numbers
    95:      */
     public function precision($number, $precision = 3)
     {
         return $this->_engine->precision($number, $precision);
     }

     /**
    102:      * Returns a formatted-for-humans file size.
    103:      *
    104:      * @param int $size Size in bytes
    105:      * @return string Human readable size
    106:      * @see \Cake\I18n\Number::toReadableSize()
    107:      * @link http://book.cakephp.org/3.0/en/views/helpers/number.html#interacting-with-human-readable-values
    108:      */
     public function toReadableSize($size)
    {
        return $this->_engine->toReadableSize($size);
     }

    /**
    115:      * Formats a number into a percentage string.
    116:      *
    117:      * Options:
    118:      *
    119:      * - `multiply`: Multiply the input value by 100 for decimal percentages.
    120:      *
    121:      * @param float $number A floating point number
    122:      * @param int $precision The precision of the returned number
    123:      * @param array $options Options
    124:      * @return string Percentage string
    125:      * @see \Cake\I18n\Number::toPercentage()
    126:      * @link http://book.cakephp.org/3.0/en/views/helpers/number.html#formatting-percentages
    127:      */
     public function toPercentage($number, $precision = 2, array $options = [])
     {
         return $this->_engine->toPercentage($number, $precision, $options);
     }

     /**
    134:      * Formats a number into the correct locale format
    135:      *
    136:      * Options:
    137:      *
    138:      * - `places` - Minimum number or decimals to use, e.g 0
    139:      * - `precision` - Maximum Number of decimal places to use, e.g. 2
    140:      * - `locale` - The locale name to use for formatting the number, e.g. fr_FR
    141:      * - `before` - The string to place before whole numbers, e.g. '['
    142:      * - `after` - The string to place after decimal numbers, e.g. ']'
    143:      * - `escape` - Whether or not to escape html in resulting string
    144:      *
    145:      * @param float $number A floating point number.
    146:      * @param array $options An array with options.
    147:      * @return string Formatted number
    148:      * @link http://book.cakephp.org/3.0/en/views/helpers/number.html#formatting-numbers
    149:      */
    public function format($number, array $options = [])
     {
         $formatted = $this->_engine->format($number, $options);
         $options += ['escape' => true];
         return $options['escape'] ? h($formatted) : $formatted;
     }

     /**
    158:      * Formats a number into a currency format.
    159:      *
    160:      * ### Options
    161:      *
    162:      * - `locale` - The locale name to use for formatting the number, e.g. fr_FR
    163:      * - `fractionSymbol` - The currency symbol to use for fractional numbers.
    164:      * - `fractionPosition` - The position the fraction symbol should be placed
    165:      *    valid options are 'before' & 'after'.
    166:      * - `before` - Text to display before the rendered number
    167:      * - `after` - Text to display after the rendered number
    168:      * - `zero` - The text to use for zero values, can be a string or a number. e.g. 0, 'Free!'
    169:      * - `places` - Number of decimal places to use. e.g. 2
    170:      * - `precision` - Maximum Number of decimal places to use, e.g. 2
    171:      * - `pattern` - An ICU number pattern to use for formatting the number. e.g #,###.00
    172:      * - `useIntlCode` - Whether or not to replace the currency symbol with the international
    173:      *   currency code.
    174:      * - `escape` - Whether or not to escape html in resulting string
    175:      *
    176:      * @param float $number Value to format.
    177:      * @param string $currency International currency name such as 'USD', 'EUR', 'JPY', 'CAD'
    178:      * @param array $options Options list.
    179:      * @return string Number formatted as a currency.
    180:      */
     public function currency($number, $currency = null, array $options = [])
     {
         $formatted = $this->_engine->currency($number, $currency, $options);
         $options += ['escape' => true];
        return $options['escape'] ? h($formatted) : $formatted;
    }

     /**
    189:      * Formats a number into the correct locale format to show deltas (signed differences in value).
    190:      *
    191:      * ### Options
    192:      *
    193:      * - `places` - Minimum number or decimals to use, e.g 0
    194:      * - `precision` - Maximum Number of decimal places to use, e.g. 2
    195:      * - `locale` - The locale name to use for formatting the number, e.g. fr_FR
    196:      * - `before` - The string to place before whole numbers, e.g. '['
    197:      * - `after` - The string to place after decimal numbers, e.g. ']'
    198:      * - `escape` - Set to false to prevent escaping
    199:      *
    200:      * @param float $value A floating point number
    201:      * @param array $options Options list.
    202:      * @return string formatted delta
    203:      */
    public function formatDelta($value, array $options = [])
    {
         $formatted = $this->_engine->formatDelta($value, $options);
         $options += ['escape' => true];
         return $options['escape'] ? h($formatted) : $formatted;
     }

     /**
    212:      * Getter/setter for default currency
    213:      *
    214:      * @param string|bool $currency Default currency string to be used by currency()
    215:      * if $currency argument is not provided. If boolean false is passed, it will clear the
    216:      * currently stored value
    217:      * @return string Currency
    218:      */
     public function defaultCurrency($currency)
     {
         return $this->_engine->defaultCurrency($currency);
     }

     /**
    225:      * Event listeners.
    226:      *
    227:      * @return array
    228:      */
    public function implementedEvents()
     {
         return [];
     }

     /**
    235:      * Formats a number into locale specific ordinal suffix.
    236:      *
    237:      * @param int|float $value An integer
    238:      * @param array $options An array with options.
    239:      * @return string formatted number
    240:      */
     public function ordinal($value, array $options = [])
     {
         return $this->_engine->ordinal($value, $options);
     }
}
