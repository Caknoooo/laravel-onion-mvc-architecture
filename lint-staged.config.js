module.exports = {
    "resources/**/*.{css,js}": ["prettier --write"],
    "**/*.php": [
        "php ./vendor/bin/php-cs-fixer fix --config .php-cs-fixer.php --allow-risky=yes",
    ],
};
