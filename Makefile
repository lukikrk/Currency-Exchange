DE=docker exec -it -u www-data currency_exchange

application:
	make install --no-print-directory
	@$(DE) make 2>&1 > /dev/null

########################################################################################################################

bash:
	@$(DE) bash

down:
	docker compose down

install:
	docker compose up -d --build

logs:
	docker logs -f core_api

root:
	@echo '🕷 With great power comes great responsibility! 🕷'
	@docker exec -u root -it core_api bash

stop:
	docker compose stop

test:
	$(DE) ./vendor/bin/phpunit tests

up:
	docker compose up -d
	@$(DE) make 2>&1 > /dev/null
