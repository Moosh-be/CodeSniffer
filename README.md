# Kamelot Codesniffer

Some custom PHP codesniffer rules

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

Run commands

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


## Installation

Installation through Composer

    composer require kamelot/CodeSniffer   
