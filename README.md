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
- [CKEditor](https://ckeditor.com/docs/index.html)

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
![login](https://github.com/ZeinabJahanbakhsh/job-board/assets/18625433/556bde3f-8c31-4245-9748-c9e5a37ac0e0)

## Register form
![Register](https://github.com/ZeinabJahanbakhsh/job-board/assets/18625433/5cf06a7d-c01c-4de5-ad10-5699f7825626)

## Employer dashboard
![employer](https://github.com/ZeinabJahanbakhsh/job-board/assets/18625433/526f8079-f9ac-4ec1-bd5f-d4ff0e7a87b2)

## Candidate dashboard
![candidate](https://github.com/ZeinabJahanbakhsh/job-board/assets/18625433/610dd4b9-11ec-41d1-8dad-e2ece928d591)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
