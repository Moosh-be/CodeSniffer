# Kamelot Codesniffer

Some custom PHP codesniffer rules

https://packagist.org/packages/kamelot/code-sniffer


[![Dependency Status](https://www.versioneye.com/user/projects/5a9821670fb24f2cfe29cc2d/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/5a9821670fb24f2cfe29cc2d)
[![Latest Stable Version](https://poser.pugx.org/kamelot/code-sniffer/v/stable)](https://packagist.org/packages/kamelot/code-sniffer)
[![Total Downloads](https://poser.pugx.org/kamelot/code-sniffer/downloads)](https://packagist.org/packages/kamelot/code-sniffer)
[![Latest Unstable Version](https://poser.pugx.org/kamelot/code-sniffer/v/unstable)](https://packagist.org/packages/kamelot/code-sniffer)
[![License](https://poser.pugx.org/kamelot/code-sniffer/license)](https://packagist.org/packages/kamelot/code-sniffer)
[![composer.lock](https://poser.pugx.org/kamelot/code-sniffer/composerlock)](https://packagist.org/packages/kamelot/code-sniffer)


# Rule List

@todo would include a ticket/issue id


## Examples

Using report:

```bash
vendor/bin/phpcs --standard=standard/Kamelot/ruleset.xml --extensions=php \
--encoding=utf-8 -n tests/Kamelot/ok/ --colors
```

Default usage
```bash
vendor/bin/phpcs --standard=standard/Kamelot/ruleset.xml --extensions=php \
--encoding=utf-8 -n src --colors
```

## Testing code

### Run commands

Checking if everything is wrong :-)

```bash
vendor/bin/phpcs --standard=standard/Kamelot/ruleset.xml \
--extensions=php --encoding=utf-8 -n tests/Kamelot/errors
```

Checking if everything is OK

```bash
vendor/bin/phpcs --standard=standard/Kamelot/ruleset.xml \
--extensions=php --encoding=utf-8 -n tests/Kamelot/ok
```

### PhpUnit
You can do that through phpunit now


```bash
vendor/bin/phpunit
```

## Installation

Installation through Composer

    composer require kamelot/CodeSniffer   
