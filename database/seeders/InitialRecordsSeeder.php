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
            ['title' => 'Communication Training', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rem ipsa cumque assumenda voluptatibus. Laudantium!', 'image' => '4.jpg'],
            ['title' => 'Content Creative Workshop', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rem ipsa cumque assumenda voluptatibus. Laudantium!', 'image' => '8.jpg'],
            ['title' => 'Outbond & Team Building', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rem ipsa cumque assumenda voluptatibus. Laudantium!', 'image' => '10.jpg'],
            ['title' => 'Photo & Video Documentation', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rem ipsa cumque assumenda voluptatibus. Laudantium!', 'image' => '3.jpg'],
            ['title' => 'Event & Talkshow', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rem ipsa cumque assumenda voluptatibus. Laudantium!', 'image' => '9.jpg']
        ]);

        DB::table('team')->insert([
            ['name' => 'Risa Karmida, M.A.', 'position' => 'Trainer', 'image' => 'risa_karmida.jpeg'],
            ['name' => 'Avie Kusnadi, S.I.Kom', 'position' => 'Trainer', 'image' => 'avie_kusnadi.jpeg'],
            ['name' => 'Zayn Asyari, M.I.Kom', 'position' => 'Trainer', 'image' => 'zayn_asyari.jpeg'],
            ['name' => 'Nur Hidayah Perwitasari', 'position' => 'Marketing & Branding', 'image' => 'nur_hidayah_perwitasari.jpeg'],
            ['name' => 'Risty', 'position' => 'Marketing & Branding', 'image' => 'risty_baitul.jpeg'],
            ['name' => 'Derwin Natanael', 'position' => 'Marketing & Branding', 'image' => 'derwin_natanael.jpeg'],
            ['name' => 'Reza', 'position' => 'Marketing & Branding', 'image' => 'reza.jpeg']
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
            ['name' => 'Software Seni', 'image' => 'software_seni.png'],
            ['name' => 'Jogja Air Crew', 'image' => 'jogja_air_crew.png'],
            ['name' => 'Polda DIY', 'image' => 'polda_diy.png'],
            ['name' => 'Fakultas Hukum UGM', 'image' => 'fakultas_hukum_ugm.png'],
            ['name' => 'Fakultas Kedokteran, Kesehatan Masyarakat & Keperawaatan UGM', 'image' => 'fakultas_kedokteran_kesehatan_masyarakat_keperawaatan_ugm.png'],
            ['name' => 'Platinum Hotel', 'image' => 'platinum_hotel.png'],
            ['name' => 'Grand Keisha Hotel', 'image' => 'grand_keisha_hotel.png'],
            ['name' => 'BKN Regional 1', 'image' => 'bkn_regional_1.png'],
            ['name' => 'InaVoice', 'image' => 'inavoice.png'],
            ['name' => 'ASL Logistik (Artalapan Strategi Logistik)', 'image' => 'asl_logistik_artalapan_strategi_logistik.png'],
            ['name' => 'LPP Agro', 'image' => 'lpp_agro.png'],
            ['name' => 'Beri Jalan', 'image' => 'beri_jalan.png'],
        ]);

        DB::table('value')->insert([
            ['title' => 'Expert Instructors', 'description' => 'Instructors are seasoned practitioners in their respective fields.', 'image' => 'expert.jpg'],
            ['title' => 'Balanced Training', 'description' => 'The training system is engaging with current content reflecting global communication trends, split evenly between theory and practice.', 'image' => 'balanced.jpg'],
            ['title' => 'Flexible Training', 'description' => 'Training schedules and locations are flexible to meet clients needs.', 'image' => 'flexible.jpg'],
        ]);
    }
}
