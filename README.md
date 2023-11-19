# Introduction

Job board is a simple system that can be used by candidates and employers with their own role-permissions.
In this way, the employer registers the job advertisements and the candidates sees all of them and chooses one and then sends its own resume to that company.

# Requirement
- Backend: [Laravel 9.19](https://laravel.com/docs/9.x/installation)
- Database: Mysql
- Front and dashboard with The Larastarters: [AdminLTE3 and Laravel UI (Bootstrap) starter kit](https://github.com/LaravelDaily/Larastarters) 
- Authentication: [Sanctum](https://laravel.com/docs/9.x/sanctum)
- Authorization: Gate and Policy
- Laravel Socialite: google, github 


### Each user has a profile:
- Employers can register in this system and create advertisements.
- Candidates can also register profile, upload and submit their resume.


# How to use:
- Clone the repository with git clone
- Copy .env.example file to .env and edit database credentials there
- Run composer install
- Run ```php artisan key:generate```
- For run migration and seeder:
    - Run ```php artisan project:insert-demo-data``` (it can create migrations and insert demo data with 3 users: a admin, a candidate and a employer at the end run ``` php artisan optimize:clear```)
    - Run ```php artisan project:insert-additional-data``` (it can create migrations and insert demo data with a lot of records: a admin, some candidates and some employers at the end run ``` php artisan optimize:clear```)
    - If you don't want to insert any data, it is just enough to run  ```php artisan migrate ```
- Done! Run ```php artisan serv``` and ```npm run dev```.
- Admin's credentials: admin@admin.com - 123456
- Employer's credentials: employer@employer.com - 123456
- Candidate's credentials: candidate@candidate.com - 123456


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
