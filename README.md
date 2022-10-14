
# Find Work API 

It is an API based on a website for searching jobs and creating the applicant informations.
> This project was created as a backend final project of the FLAG institution.


## Technologies description

**Tecnology** | **Version**

- `PHP` |  **8.1.5** 
- `Laravel`  |  **9.x**
- `Sanctum` | **^3.0**
- `MySQL` | **10.4.24**
- `Guzzlehttp/guzzle` | **^7.2**
- `Postman` | **9.x**
- `Dbeaver` | **22.x**
- `Vite` | **3.0**


## Database Information

![image](https://user-images.githubusercontent.com/85341804/194774725-d402731a-bc44-4ba3-ac53-7b6e6272b0d0.png)

## Running the project

### Clone

```bash
   https://github.com/Fleemings/findWork.git
```

### Copy the enviroment file 

```bash
    cp .env.example .env
```

### Installing the dependecies

```bash
    composer install
```

### Key

```bash
    php artisan key:generate
```

### Database setup

```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=findwork
    DB_USERNAME=root
    DB_PASSWORD=
```

### Database migrate

```bash
    php artisan migrate
```

### Database seeding

```bash
    php artisan db:seed
```

## Postman

Postman was used to test all API routes in this project.

- To check the endpoints, go to:

```bash
  cat .\postman\api_findwork.postman_collection.json 
```

- To check the enviroment variables, go to:

```bash
    cat .\postman\api_findwork.postman_environment.json
  
```

## API documentation

### Authentication ###

#### POST | register

```
    http://[LOCAL_URL]/api/register
```

- Example

```json
    "message": "User created successfully",
    "data": {
        "user": {
            "name": "Usuario",
            "email": "usuario@test.com",
            "updated_at": "2022-10-10T20:52:53.000000Z",
            "created_at": "2022-10-10T20:52:53.000000Z",
        },
        "token": "31|iwLF0Qe6dpl0MMRHFlBc0MN1IUKmoUdgjdQcddf4"
    }
```

#### POST | login

```
    http://[LOCAL_URL]/api/login
```

- Example

```json
    "data": {
        "user": {
            "name": "Usuario",
            "email": "usuario@test.com",
            "email_verified_at": null,
            "created_at": "2022-10-10T20:52:53.000000Z",
            "updated_at": "2022-10-10T20:52:53.000000Z"
        },
        "token": "32|Y4UrpHSBiKTH8tkx5qZAl2nWALfjYTUdR7gn1nSJ"
    }
```

#### POST | logout

```
    http://[LOCAL_URL]/api/logout
```

- Example

```json
    "data": {
        "message": "You have been successfully logout and the token has been deleted"
    }
```

#### GET | user

```
    http://[LOCAL_URL]/api/user/{id}
```

- Example

```json
    "data": {
        "user": {
            "name": "Usuario",
            "email": "usuario@test.com",
            "email_verified_at": null,
            "created_at": "2022-10-10T20:52:53.000000Z",
            "updated_at": "2022-10-10T20:52:53.000000Z"
        }
    }
```

### Applicant ###

#### GET | applicant 

```
    http://[LOCAL_URL]/api/applicant/all
```

- Example

```json
"message": null,
    "data": [
        {
            "first_name": "Linda",
            "last_name": "Sanford",
            "job_title": "Tire Builder",
            "city": "Dickensmouth",
            "website": "schroeder.net",
            "email": "kjerde@gmail.com",
            "phone_number": "313.257.7598",
            "about_me": "Voluptatem in odio eveniet placeat eos maiores. Laborum et praesentium nostrum corporis delectus numquam incidunt. Eum tempore unde et ut. Laborum recusandae ut et.",
            "created_at": "2022-09-29T21:24:43.000000Z",
            "updated_at": "2022-09-29T21:24:43.000000Z"
        },
```

### Company ###

#### GET | company 

```
    http://[LOCAL_URL]/api/company/all
```

- Example

```json
"message": null,
    "data": [
        {
            "name": "Turcotte, Quigley and Pollich",
            "review": 5,
            "short_description": "Et nobis ut natus repellat at eius. Assumenda quos ea placeat ipsa quis. Cumque nesciunt iste iste in. Quis ipsum earum ratione omnis dolore incidunt expedita aliquam.",
            "created_at": "2022-09-29T21:24:44.000000Z",
            "updated_at": "2022-09-29T21:24:44.000000Z"
        },
```

### Education ###

#### GET | education 

```
    http://[LOCAL_URL]/api/education/all
```

- Example

```json

    "data": [
        {
            "school": "quia molestiae fugit",
            "degree": "Enhanced neutral task-force",
            "start_date": "2004-01-22 00:03:44",
            "end_date": "2015-01-05 13:49:20",
            "description": "Rerum ullam laboriosam sit recusandae quam. Eaque ea illo possimus sed commodi quibusdam rerum. Natus ea est quia dicta quia dolores cum earum.",
            "currently": 1,
            "applicant_id": 4,
            "created_at": "2022-09-29T21:24:43.000000Z",
            "updated_at": "2022-09-29T21:24:43.000000Z"
        },
 ```

### Experience ###

#### GET | experience 

```
    http://[LOCAL_URL]/api/experience/all
```

- Example

```json

    "data": [
        {
            "role": "Photographic Developer",
            "company_name": "Reinger Ltd",
            "city": "South Korbin",
            "start_date": "2011-03-28 15:37:39",
            "end_date": "2019-08-21 21:45:46",
            "currently": 0,
            "description": "Qui ullam corporis consequatur voluptatum dolores quasi autem. Ipsam fugit soluta aliquam ut qui nihil omnis.",
            "applicant_id": 4,
            "created_at": "2022-09-29T21:24:43.000000Z",
            "updated_at": "2022-09-29T21:24:43.000000Z"
        },

```


### Role ###

#### GET | role 

```
    http://[LOCAL_URL]/api/role/all
```


- Example

```json

    "data": [
        {
            "title": "Photoengraving Machine Operator",
            "salary": 2.000,
            "benefit": "Voluptas consequatur officia atque laboriosam reiciendis est sunt ut. Dolorem dignissimos omnis in nihil nisi neque itaque. Animi quia cum sit sequi eos quia asperiores dolor.",
            "description": "Rerum ullam laboriosam sit recusandae quam. Eaque ea illo possimus sed commodi quibusdam rerum. Natus ea est quia dicta quia dolores cum earum",
            "experience_time": "2",
            "company_id": 51,
            "created_at": "2022-09-29T21:24:45.000000Z",
            "updated_at": "2022-09-29T21:24:45.000000Z"
        },

```

### Technology ###

#### GET | technology 

```
    http://[LOCAL_URL]/api/tecnology/all
```

- Example

```json

    "data": [
        {
            "name": "ut",
            "created_at": "2022-09-29T21:24:44.000000Z",
            "updated_at": "2022-09-29T21:24:44.000000Z"
        },

```


## License

Open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
