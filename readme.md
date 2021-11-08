
## PSR Logger 
![License](https://img.shields.io/github/license/aschmelyun/larametrics.svg?style=flat-square)

Simple Example how to implements [PSR-3 Logger Interface](https://www.php-fig.org/psr/psr-3/). 

``composer require psr/log:1.1.4``

## Example

````
$log = new Logger\Logger(
    new \Logger\writers\FileWriter('default.log'),
    new \Logger\Formater()
);


$log->info("Info message");
$log->alert("Alert message");
$log->error("Error message");
$log->debug("Debug message");
$log->notice("Notice message");
$log->warning("Warning message");
$log->critical("Critical message");
$log->emergency("Emergency message");
````

## Formater

Format date:

``private $dateFormat = 'Y-m-d H:i:s';``

Message template:

``private $template = "{date} {level} {message} {context}";``

Transformation $context array in string line:

``public function arrayToString(array $context = [])``



## Writers

* Data Base - ``DbWriter.php``
* File  - ``FileWrite.php``
* System Log - ``SysLogWrite.php``
