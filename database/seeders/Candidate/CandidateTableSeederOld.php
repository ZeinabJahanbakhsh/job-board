<?php

namespace Database\Seeders\Candidate;

use App\Models\Candidate\Candidate;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;


class CandidateTableSeederOld extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //dd(UploadedFile::fake()->create(fake()->word . '.pdf', 100));//uri: "C:\Users\RasaEc\AppData\Local\Temp\php356B.tmp"
        //dd(Storage::fake()->files('/resume')); //[]
        //dd(Storage::fake('resumee')); //"C:\xampp\htdocs\job-board\storage\framework/testing/disks/resumee"
        // dd(fake()->filePath()); //C:\Users\RasaEc\AppData\Local\Temp\fak6701.tmp
        //dd(fake()->file); //  Source directory /tmp does not exist or is not a directory.
        // dd(fake()->file()); //   Source directory /tmp does not exist or is not a directory.

        $data = collect([
            [
                'first_name' => fake()->firstName(),
                'last_name'  => fake()->lastName(),
                'email'      => fake()->email(),
                'mobile'     => fake()->phoneNumber(),
                'file'       => UploadedFile::fake()->create(fake()->monthName . '.pdf')->store('seeder-resumes'),
            ],
            [
                'first_name' => fake()->firstName(),
                'last_name'  => fake()->lastName(),
                'email'      => fake()->email(),
                'mobile'     => fake()->phoneNumber(),
                'file'       => UploadedFile::fake()->create(fake()->monthName . '.pdf')->store('seeder-resumes'),
            ],
            [
                'first_name' => fake()->firstName(),
                'last_name'  => fake()->lastName(),
                'email'      => fake()->email(),
                'mobile'     => fake()->phoneNumber(),
                'file'       => UploadedFile::fake()->create(fake()->monthName . '.pdf')->store('seeder-resumes'),
            ],
            [
                'first_name' => fake()->firstName(),
                'last_name'  => fake()->lastName(),
                'email'      => fake()->email(),
                'mobile'     => fake()->phoneNumber(),
                'file'       => UploadedFile::fake()->create(fake()->monthName . '.pdf')->store('seeder-resumes'),
            ],
            [
                'first_name' => fake()->firstName(),
                'last_name'  => fake()->lastName(),
                'email'      => fake()->email(),
                'mobile'     => fake()->phoneNumber(),
                'file'       => UploadedFile::fake()->create(fake()->monthName . '.pdf')->store('seeder-resumes'),
            ],
        ]);

        $data->each(function ($value) {
            Candidate::create([
                'first_name' => $value['first_name'],
                'last_name'  => $value['last_name'],
                'email'      => $value['email'],
                'mobile'     => $value['mobile'],
                'file'       => $value['file'],
            ]);
        });
    }


}
