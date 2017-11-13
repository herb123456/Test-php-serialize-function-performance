# Test serialize function performance in PHP 7.1

## Test 

* Array with number
* Array with string
* Multi level array with number
* Multi level array with string
* Multi level array with number and string
* Object
* Multi level object

## Test environment

* AWS t2.micro
* PHP 7.1

```
PHP 7.1.11 (cli) (built: Oct 25 2017 10:00:47) ( NTS )
Copyright (c) 1997-2017 The PHP Group
Zend Engine v3.1.0, Copyright (c) 1998-2017 Zend Technologies
    with Zend OPcache v7.1.11, Copyright (c) 1999-2017, by Zend Technologies
```

## Result

### Array with number

```php
define('ARRAY_SIZE', 300);
define('TEST_TIME', 100);
```

```
serialize time: 				0.0010788440704346
unserialize time: 				0.0027780532836914
json_encode time: 				0.00069093704223633
json_decode time: 				0.0027239322662354
igbinary_serialize time: 		0.00054502487182617
igbinary_unserialize time: 		0.00051093101501465
```

#### serialize: igbinary\_serialize > json_encode > serialize
#### unsirialize: igbinary\_unserialize > json_decode > unserialize

### Array with string

```php
define('ARRAY_SIZE', 300);
define('STR_LENGTH', 100);
define('TEST_TIME', 100);
```
```
serialize time: 				0.0014660358428955
unserialize time: 				0.0031919479370117
json_encode time: 				0.02100396156311
json_decode time: 				0.019490003585815
igbinary_serialize time: 		0.0020298957824707
igbinary_unserialize time: 		0.001331090927124
```
#### serialize: serialize > igbinary\_serialize > json_encode
#### unsirialize: igbinary\_unsirialize > unserialize > json_decode

### Multi level array with number

```php
define('ARRAY_SIZE', 300);
define('ARRAY_DEEP', 30);
define('TEST_TIME', 10);
```
```
serialize time: 				0.0074031352996826
unserialize time: 				0.020796060562134
json_encode time: 				0.0040719509124756
json_decode time: 				0.021830081939697
igbinary_serialize time: 		0.0094568729400635
igbinary_unserialize time: 		0.0080678462982178
```
#### serialize: json_encode > serialize > igbinary\_serialize
#### unsirialize: igbinary\_unsirialize > json_decode > unserialize

### Multi level array with string

```php
define('ARRAY_SIZE', 300);
define('ARRAY_DEEP', 30);
define('STR_LENGTH', 100);
define('TEST_TIME', 10);
```
```
serialize time: 				0.011026859283447
unserialize time: 				0.023138999938965
json_encode time: 				0.069886922836304
json_decode time: 				0.076200008392334
igbinary_serialize time: 		0.019577980041504
igbinary_unserialize time: 		0.013104915618896
```

#### serialize: serialize > igbinary\_serialize > json_encode
#### unsirialize: igbinary\_unsirialize > unserialize > json_decode

### Multi level array with number and string

```php
define('ARRAY_SIZE', 300);
define('ARRAY_DEEP', 30);
define('STR_LENGTH', 100);
define('TEST_TIME', 10);
```

```
serialize time: 				0.013853073120117
unserialize time: 				0.033852100372314
json_encode time: 				0.072479009628296
json_decode time: 				0.086339950561523
igbinary_serialize time: 		0.025516033172607
igbinary_unserialize time: 		0.014665126800537
```

#### serialize: serialize > igbinary\_serialize > json_encode
#### unsirialize: igbinary\_unsirialize > unserialize > json_decode

### Object

```php
define('OBJ_PROP_SIZE', 300);
define('TEST_TIME', 100);
```

```
serialize time: 				0.0015609264373779
unserialize time: 				0.0032401084899902
json_encode time: 				0.022146940231323
json_decode time: 				0.022933006286621
igbinary_serialize time: 		0.0033202171325684
igbinary_unserialize time: 		0.0027999877929688
```
#### serialize: serialize > igbinary\_serialize > json_encode
#### unsirialize: igbinary\_unsirialize > unserialize > json_decode

### Multi level object

```php
define('OBJ_PROP_SIZE', 100);
define('OBJ_DEEP_SIZE', 30);
define('TEST_TIME', 100);
```

```
serialize time: 				0.015815019607544
unserialize time: 				0.036242008209229
json_encode time: 				0.22513890266418
json_decode time: 				0.23918008804321
igbinary_serialize time: 		0.056578159332275
igbinary_unserialize time: 		0.032699108123779
```

#### serialize: serialize > igbinary\_serialize > json_encode
#### unsirialize: igbinary\_unsirialize > unserialize > json_decode


## Conclusion

Serialize function is php built-in serialize win.

Unserialize is igbinary win.




