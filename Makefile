.PHONY: install
install:
	symfony composer install
	yarn
	yarn dev

.PHONY: watch
watch:
	yarn
	yarn watch
