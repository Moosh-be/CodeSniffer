# Kamelot Codesniffer

Some custom PHP codesniffer rules

https://packagist.org/packages/kamelot/code-sniffer


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
