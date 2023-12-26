# P.A Service

# Attendence
| ID | Name | Role |
:--:| :--: | :--:
| 23560012 | Nguyễn Võ Chí Dũng | Team Leader - Backend |
| 23560018 | Nguyễn Gia Hy | Database |
| 23560020 | Huỳnh Tấn Khang | Front-end |

# HOW TO USE DOCKER-COMPOSE FOR DEV
# 1. SET UP PROJECT
1. Extract docker-compose.zip into your project
2. Create a folder "dump" and add sql file (create table, insert data,...)

# 2. START PROJECT
1. Open command prompt at project
2. Run "sh ./dev.sh" to start the project
3. Open other command prompt and run "docker ps" to show list running containers. Example:
CONTAINER ID   IMAGE                COMMAND                  CREATED         STATUS         PORTS                            NAMES
01d498a9e412   napas-test-chatapp   "docker-php-entrypoi…"   5 seconds ago   Up 4 seconds   80/tcp, 0.0.0.0:8000->8000/tcp   chatapp-1
2d1746bdc95c   mysql                "docker-entrypoint.s…"   5 seconds ago   Up 4 seconds   3306/tcp, 33060/tcp              mysql-db-1
4. Run "docker exec -it -u 0 <container_name> sh". Example: docker exec -it -u 0 napas-test-chatapp-1 sh
5. Run "php -S 0.0.0.0:8000" to start your php project

# HOW TO USE DOCKER-COMPOSE FOR PRODUCTION
1. Open Dockerfile
2. Uncomment the command line and save
3. Run "sh ./dev.sh"


