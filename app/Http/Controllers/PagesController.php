<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $banners = [
            ['title' => 'Communication Training', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rem ipsa cumque assumenda voluptatibus. Laudantium!', 'image' => '4.jpg'],
            ['title' => 'Content Creative Workshop', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rem ipsa cumque assumenda voluptatibus. Laudantium!', 'image' => '8.jpg'],
            ['title' => 'Outbond & Team Building', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rem ipsa cumque assumenda voluptatibus. Laudantium!', 'image' => '10.jpg'],
            ['title' => 'Photo & Video Documentation', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rem ipsa cumque assumenda voluptatibus. Laudantium!', 'image' => '3.jpg'],
            ['title' => 'Event & Talkshow', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rem ipsa cumque assumenda voluptatibus. Laudantium!', 'image' => '9.jpg']
        ];

        $teamMembers = [
            ['name' => 'Risa Karmida, M.A.', 'position' => 'Trainer', 'image' => 'risa_karmida.jpeg'],
            ['name' => 'Avie Kusnadi, S.I.Kom', 'position' => 'Trainer', 'image' => 'avie_kusnadi.jpeg'],
            ['name' => 'Zayn Asyari, M.I.Kom', 'position' => 'Trainer', 'image' => 'zayn_asyari.jpeg'],
            ['name' => 'Nur Hidayah Perwitasari', 'position' => 'Marketing & Branding', 'image' => 'nur_hidayah_perwitasari.jpeg'],
            ['name' => 'Risty', 'position' => 'Marketing & Branding', 'image' => 'risty.jpeg'],
            ['name' => 'Derwin Natanael', 'position' => 'Marketing & Branding', 'image' => 'derwin_natanael.jpeg'],
            ['name' => 'Reza', 'position' => 'Marketing & Branding', 'image' => 'reza.jpeg']
        ];

        $trainings = [
            ['type' => 'main', 'title' => 'Public Speaking', 'description' => 'Presentation Skill, Master of Ceremony, Media Interview.', 'image' => 'training1.jpeg'],
            ['type' => 'main', 'title' => 'Journalistic', 'description' => 'Script Writing, News Reporting, Journalistic Photography, Journalistic Videography.', 'image' => 'training1.jpeg'],
            ['type' => 'main', 'title' => 'Management Communication Skill', 'description' => 'Effective Communication, Leadership, Communication Problem Solving, Creative Thinking, Design Thinking, Team Work, Time Management.', 'image' => 'training1.jpeg'],
            ['type' => 'secondary', 'title' => 'Public Relations', 'description' => 'Media Handling, Social Media Strategic, Media Campaign, Event & Protocolar, Press Conference & Press Release.', 'image' => 'training1.jpeg'],
            ['type' => 'secondary', 'title' => 'Excellent Service', 'description' => 'Hospitality, Complaint Handling, English For Services, Grooming.', 'image' => 'training1.jpeg'],
            ['type' => 'secondary', 'title' => 'Personal Development', 'description' => 'Personal Confident, Personal Branding, Etiquette, Grooming.', 'image' => 'training1.jpeg'],
            ['type' => 'secondary', 'title' => 'Content Creative', 'description' => 'Videography, Photography, Content Writing, Video Editing, Photo Editing, Dubbing, Sound Engineering, Presenting.', 'image' => 'training1.jpeg'],
            ['type' => 'secondary', 'title' => 'Digital Marketing', 'description' => 'digital marketing content, SEO, Google Ads, Social media Ads, marketing e-mail, Google Analytics.', 'image' => 'training1.jpeg'],
            // ['type' => 'secondary', 'title' => 'Human Resources', 'description' => 'recruitment, career development, capacity buildings, performance evaluations and assessment, remuneration.', 'image' => 'training1.jpeg'],
            ['type' => 'secondary', 'title' => 'Training of Trainers', 'description' => 'Training Need Analysis, Syllabi, Material, Teaching Method, Evaluation Tools.', 'image' => 'training1.jpeg'],
        ];

        $clients = [
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
        ];

        $values = [
            ['title' => 'Expert Instructors', 'description' => 'Instructors are seasoned practitioners in their respective fields.', 'image' => 'value_2.jpg'],
            ['title' => 'Balanced Training', 'description' => 'The training system is engaging with current content reflecting global communication trends, split evenly between theory and practice.', 'image' => 'value_1.jpg'],
            ['title' => 'Flexible Training', 'description' => 'Training schedules and locations are flexible to meet clients needs.', 'image' => 'value_2.jpg'],
        ];

        return view("pages.home", compact('teamMembers', 'trainings', 'clients', 'values', 'banners'));
    }

    public function articles(){
        return view("pages.articles");
    }

    public function singlepost(){
        return view("pages.singlepost");
    }

    public function team(){
        $teamMembers = [
            ['name' => 'Risa Karmida, M.A.', 'position' => 'Trainer', 'image' => 'risa_karmida.jpeg'],
            ['name' => 'Avie Kusnadi, S.I.Kom', 'position' => 'Trainer', 'image' => 'avie_kusnadi.jpeg'],
            ['name' => 'Zayn Asyari, M.I.Kom', 'position' => 'Trainer', 'image' => 'zayn_asyari.jpeg'],
            ['name' => 'Nur Hidayah Perwitasari', 'position' => 'Marketing & Branding', 'image' => 'nur_hidayah_perwitasari.jpeg'],
            ['name' => 'Risty', 'position' => 'Marketing & Branding', 'image' => 'risty.jpeg'],
            ['name' => 'Derwin Natanael', 'position' => 'Marketing & Branding', 'image' => 'derwin_natanael.jpeg'],
            ['name' => 'Reza', 'position' => 'Marketing & Branding', 'image' => 'reza.jpeg']
        ];
        return view("pages.team", compact('teamMembers'));
    }

    public function clients(){
        
        $clients = [
            ['name' => 'Software Seni', 'image' => 'client_1.png'],
            ['name' => 'Jogja Air Crew', 'image' => 'client_2.png'],
            ['name' => 'Polda DIY', 'image' => 'client_1.png'],
            ['name' => 'Fakultah Hukum UGM', 'image' => 'client_1.png'],
            ['name' => 'Fakultas Kedokteran, Kesehatan Masyarakat & Keperawaatan UGM', 'image' => 'client_1.png'],
            ['name' => 'Platinum Hotel', 'image' => 'client_1.png'],
            ['name' => 'Grand Keisha Hotel', 'image' => 'client_1.png'],
            ['name' => 'BKN Regional 1', 'image' => 'client_1.png'],
            ['name' => 'InaVoice', 'image' => 'client_1.png'],
            ['name' => 'ASL Logistik (Artalapan Strategi Logistik)', 'image' => 'client_1.png'],
            ['name' => 'LPP Agro', 'image' => 'client_1.png'],
            ['name' => 'Beri Jalan', 'image' => 'client_1.png'],
        ];


        return view("pages.clients", compact('clients'));
    }

    public function trainingevent(){
        $events = [
            ['name' => 'School Reunion 1', 'brief' => 'this is brief 1', 'image' => 'risa.jpeg', 'description' => 'this is description', 'folder' => 'school_reunion', 'author' => 'Risa', 'datetime' => '9 April 2024'],
            ['name' => 'School Reunion 2', 'brief' => 'this is brief 2', 'image' => 'risa.jpeg', 'description' => 'this is description', 'folder' => 'school_reunion', 'author' => 'Risa', 'datetime' => '9 April 2024'],
            ['name' => 'School Reunion 3', 'brief' => 'this is brief 3', 'image' => 'risa.jpeg', 'description' => 'this is description', 'folder' => 'school_reunion', 'author' => 'Risa', 'datetime' => '9 April 2024'],
        ];

        return view("pages.trainingevents", compact('events'));
    }

    public function contactus(){
        return view("pages.contactus");
    }

    public function dashboard(){
        return view("pages.dashboard");
    }
}
