# Kamelot Codesniffer

Some custom PHP codesniffer rules

## Examples

Using report:

```bash
vendor/bin/phpcs --standard=standard/Kamelot/ruleset.xml --extensions=php \
--encoding=utf-8 -n tests/Kamelot/ok/ --colors
```

Default ussage
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

Installation in a Composer project (method 1)


    Add the following lines to the require-dev section of your composer.json file.

    "require-dev": {
        "squizlabs/php_codesniffer": "^2.2 || ^3.0.2",
        "wimg/php-compatibility": "*"
    },
    "prefer-stable" : true


