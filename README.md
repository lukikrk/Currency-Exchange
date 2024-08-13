# Currency Exchange

![image](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![image](https://img.shields.io/badge/Docker-2CA5E0?style=for-the-badge&logo=docker&logoColor=white)

This repository contains source code of the currency exchange application which is part of the recruitment process.

## Getting started

1. Clone repository from `git@github.com:lukikrk/currency-exchange.git`
2. Install Makefile - https://makefiletutorial.com/
3. Install Docker - https://docs.docker.com/
4. In the console get into the main project directory and type `make`
5. Wait until the installation process is done
6. Voilà!
7. After the first installation use `make up` and `make stop` to turn on and turn off the project

## Project structure and most important directories

- `/app` - main workspace of the application and WORKDIR of Docker environment
- `/docker` - Docker environment configuration
- `/app/src` - source code of the application
- `/app/tests` - unit tests for written code

## Useful commands

- `make` - alias for `make application`, it does the first installation of the application
- `make bash` - takes you into the console of the main application container
- `make down` - shortcut for `docker compose down` - stops running containers and also discards them and the networks
  they were utilizing
- `make logs` - show main application container logs in the following mode
- `make root` - similar to `make bash`, but `root` is the initial user. Be careful!
  `🕷 With great power comes great responsibility! 🕷`
- `make stop` - stops all containers
- `make test` - runs all tests for the application
- `make up` - turns on the project, shortcut for `docker compose up -d`
