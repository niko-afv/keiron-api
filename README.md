# Keiron Test Project 

##### By Nicolás Fredes


### Description
Project to apply as web developer on [Keiron.cl](http://keiron.cl/) 


### Stack

| Tech | purpose |
| ------------- | ------------- |
| [Laravel](https://laravel.com/)  | Back End Framework  |
| [React JS](https://es.reactjs.org/)  | Front End Framework  |
| [React Bootstrap](https://react-bootstrap.github.io/)  | UI Framework  |
| [MySQL](https://www.mysql.com/)  | Database Server  |
| [Nginx](https://www.nginx.com/)  | Web Server  |
| [Docker](https://www.docker.com/)  | Containers Tool  |
| [Docker Compose](https://docs.docker.com/compose/)  | Multi Container Orchestrator  |

### How To install And Test
 
1.- Clone this repo:
```sh
$ git clone https://github.com/niko-afv/keiron-api.git
```

2.- Enter to project directory:
```sh
$ cd keiron-api
```

3.- Copy .env file (from the email):
```sh
$ cp env/file/path/.env .
```
4.- Lift all containers:
```sh
$ docker-compose up --build
```
5.- Open another terminal tab and generate the encryption keys with:
```sh
$ docker exec keiron-api php artisan passport:install
```
6.- Now, open a new browser tab:
```sh
127.0.0.1:3000
``` 
You can see all services enabled with:
```sh
$ docker ps
```

| Service | URL |
| ------------- | ------------- |
| Client APP  | ``` 127.0.0.1:3000 ```  |
| API  | ``` 127.0.0.1:80 ```  |
| MySQL  | ``` 127.0.0.1:3306 ```  |

### First Login
Login as admin
```
user: niko.afv@gmail.com
pass: keiron-user
``` 
