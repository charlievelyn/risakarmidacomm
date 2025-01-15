<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitialRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banner')->insert([
            ['title' => 'Communication Training', 'description' => 'No Description', 'image_path' => 'storage/asset/banners/20250113_160706_communication.jpg'],
            ['title' => 'Content Creative Workshop', 'description' => 'No Description', 'image_path' => 'storage/asset/banners/20250113_160751_content.jpg'],
            ['title' => 'Outbond & Team Building', 'description' => 'No Description', 'image_path' => 'storage/asset/banners/20250113_160826_outbond.jpg'],
            ['title' => 'Photo & Video Documentation', 'description' => 'No Description', 'image_path' => 'storage/asset/banners/20250113_160847_photo.jpg'],
            ['title' => 'Event & Talkshow', 'description' => 'No Description', 'image_path' => 'storage/asset/banners/20250113_160920_event.jpg']
        ]);

        DB::table('team')->insert([
            ['name' => 'Risa Karmida, M.A.', 'position' => 'Trainer', 'image_path' => 'storage/asset/teams/20250115_042655_risa.jpeg'],
            ['name' => 'Avie Kusnadi, S.I.Kom', 'position' => 'Trainer', 'image_path' => 'storage/asset/teams/20250115_042854_avie.jpeg'],
            ['name' => 'Zayn Asyari, M.I.Kom', 'position' => 'Trainer', 'image_path' => 'storage/asset/teams/20250115_043000_zayn.jpeg'],
            ['name' => 'Nur Hidayah Perwitasari', 'position' => 'Marketing & Branding', 'image_path' => 'storage/asset/teams/20250115_043033_nur.jpeg'],
            ['name' => 'Risty', 'position' => 'Marketing & Branding', 'image_path' => 'storage/asset/teams/20250115_043110_risty.jpeg'],
            ['name' => 'Derwin Natanael', 'position' => 'Marketing & Branding', 'image_path' => 'storage/asset/teams/20250115_043143_derwin.jpeg'],
            ['name' => 'Reza', 'position' => 'Marketing & Branding', 'image_path' => 'storage/asset/teams/20250115_043202_reza.jpeg']
        ]);

        DB::table('training')->insert([
            ['type' => 'main', 'title' => 'Public Speaking', 'description' => 'Presentation Skill, Master of Ceremony, Media Interview.', 'icon' => 'fa-microphone'],
            ['type' => 'main', 'title' => 'Journalistic', 'description' => 'Script Writing, News Reporting, Journalistic Photography, Journalistic Videography.', 'icon' => 'fa-newspaper'],
            ['type' => 'main', 'title' => 'Management Communication Skill', 'description' => 'Effective Communication, Leadership, Communication Problem Solving, Creative Thinking, Design Thinking, Team Work, Time Management.', 'icon' => 'fa-handshake'],
            ['type' => 'secondary', 'title' => 'Public Relations', 'description' => 'Media Handling, Social Media Strategic, Media Campaign, Event & Protocolar, Press Conference & Press Release.', 'icon' => 'fa-globe'],
            ['type' => 'secondary', 'title' => 'Excellent Service', 'description' => 'Hospitality, Complaint Handling, English For Services, Grooming.', 'icon' => 'fa-ribbon'],
            ['type' => 'secondary', 'title' => 'Personal Development', 'description' => 'Personal Confident, Personal Branding, Etiquette, Grooming.', 'icon' => 'fa-arrow-trend-up'],
            ['type' => 'secondary', 'title' => 'Content Creative', 'description' => 'Videography, Photography, Content Writing, Video Editing, Photo Editing, Dubbing, Sound Engineering, Presenting.', 'icon' => 'fa-palette'],
            ['type' => 'secondary', 'title' => 'Digital Marketing', 'description' => 'digital marketing content, SEO, Google Ads, Social media Ads, marketing e-mail, Google Analytics.', 'icon' => 'fa-bullhorn'],
            // ['type' => 'secondary', 'title' => 'Human Resources', 'description' => 'recruitment, career development, capacity buildings, performance evaluations and assessment, remuneration.', 'image' => 'training1.jpeg'],
            ['type' => 'secondary', 'title' => 'Training of Trainers', 'description' => 'Training Need Analysis, Syllabi, Material, Teaching Method, Evaluation Tools.', 'icon' => 'fa-chalkboard'],
        ]);

        DB::table('client')->insert([
            ['name' => 'Software Seni', 'image_path' => 'storage/asset/clients/20250115_044313_software.png'],
            ['name' => 'Jogja Air Crew', 'image_pathimage_path' => 'storage/asset/clients/20250115_044341_jogja.png'],
            ['name' => 'Polda DIY', 'image_path' => 'storage/asset/clients/20250115_044355_polda.png'],
            ['name' => 'Fakultas Hukum UGM', 'image_path' => 'storage/asset/clients/20250115_044410_fakultas.png'],
            ['name' => 'Fakultas Kedokteran, Kesehatan Masyarakat & Keperawaatan UGM', 'image_path' => 'storage/asset/clients/20250115_044433_fakultas.png'],
            ['name' => 'Platinum Hotel', 'image_path' => 'storage/asset/clients/20250115_044451_platinum.png'],
            ['name' => 'Grand Keisha Hotel', 'image_path' => 'storage/asset/clients/20250115_044505_grand.png'],
            ['name' => 'BKN Regional 1', 'image_path' => 'storage/asset/clients/20250115_044519_bkn.png'],
            ['name' => 'InaVoice', 'image_path' => 'storage/asset/clients/20250115_044530_inavoice.png'],
            ['name' => 'ASL Logistik (Artalapan Strategi Logistik)', 'image_path' => 'storage/asset/clients/20250115_044538_asl.png'],
            ['name' => 'LPP Agro', 'image_path' => 'storage/asset/clients/20250115_044550_lpp.png'],
            ['name' => 'Beri Jalan', 'image_path' => 'storage/asset/clients/20250115_044600_beri.png'],
        ]);

        DB::table('value')->insert([
            ['title' => 'Expert Instructors', 'description' => 'Instructors are seasoned practitioners in their respective fields.', 'image' => 'expert.jpg'],
            ['title' => 'Balanced Training', 'description' => 'The training system is engaging with current content reflecting global communication trends, split evenly between theory and practice.', 'image' => 'balanced.jpg'],
            ['title' => 'Flexible Training', 'description' => 'Training schedules and locations are flexible to meet clients needs.', 'image' => 'flexible.jpg'],
        ]);
    }
}
