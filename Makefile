dev:
	@docker-compose down && \
        docker-compose build --pull --no-cache && \
        docker-compose \
            -f docker-compose.yml \
        up -d --remove-orphans

down:
	@docker-compose down


metrics:
	docker run --rm \
		-v C:\Users\Abdou\projects\wshop-models-consistency:/data imega/phpmetrics \
		--report-html=report .