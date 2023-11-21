# Introduction

Job board is a simple application that can be used by candidates and employers with their own role-permissions.
In this way, the employer registers the job advertisements and the candidates sees all of them and chooses one and then sends its own resume to that company.
Each user has a profile:
- Employers can register in this system and create advertisements.
- Candidates can also register profile, upload and submit their resume.

# Features
- Backend: [Laravel 9.19](https://laravel.com/docs/9.x/installation)
- Database: Mysql
- Front and dashboard with The Larastarters: [AdminLTE3 and Laravel UI (Bootstrap) starter kit](https://github.com/LaravelDaily/Larastarters) 
- Authentication: [Sanctum](https://laravel.com/docs/9.x/sanctum)
- Authorization: Gate and Policy
- Laravel Socialite: google, github
- CKEditor(https://ckeditor.com/docs/index.html)

# How to use:
- Clone the repository with git clone
- Copy .env.example file to .env and edit database credentials there and make your database.
- Run
  ```
  composer install
  ```

  ```
  php artisan key:generate
  ```

  ```
  npm install
  ```

- Instead of run migrations and seeders you can choose one of my console command:
    - Run below code (it can create migrations and insert demo data with 3 users: a admin, a candidate and a employer at the end run php artisan optimize:clear) 
      ``` 
      php artisan project:insert-demo-data
      ```
    - Run  below code (it can create migrations and insert demo data with a lot of records: a admin, some candidates and some employers at the end run php artisan optimize:clear)
      ```
      php artisan project:insert-additional-data
      ``` 
    - If you don't want to insert any data, it is just enough to run:
      ``` 
      php artisan migrate 
      ```
- Done! Run
  ```
  php artisan serv
  ```
   and 
  ```
  npm run dev
  ```
  
# User's credentials
- Admin's credentials: admin@admin.com - 123456
- Employer's credentials: employer@employer.com - 123456
- Candidate's credentials: candidate@candidate.com - 123456


# A few screenshots
## Login form
![login](https://github.com/ZeinabJahanbakhsh/job-board-larastarters/assets/18625433/69988486-6dc6-4d34-94fa-e008155768c3)

## Employer dashboard
![employer](https://github.com/ZeinabJahanbakhsh/job-board-larastarters/assets/18625433/35e304cd-e7bc-43c1-9efe-650c016a6a01)

## Candidate dashboard
![candidate](https://github.com/ZeinabJahanbakhsh/job-board-larastarters/assets/18625433/749bfac0-d920-40db-9f3b-9e2a219fc1e6)



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
