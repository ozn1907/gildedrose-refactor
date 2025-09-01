.PHONY: test stan csfixer csfix all

test:
	./vendor/bin/phpunit

stan:
	./vendor/bin/phpstan analyse src --level=max

# Auto-fix: applies all fixes to files
csfix:
	./vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php

# Run everything: tests, static analysis, dry-run CS Fixer
all: test stan csfix
