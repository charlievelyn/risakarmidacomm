<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $teamMembers = [
            ['name' => 'Risa Karmida, M.A.', 'position' => 'Position', 'image' => 'team1.jpeg'],
            ['name' => 'Avie Kusnadi, S.I.Kom', 'position' => 'Position', 'image' => 'team2.jpeg'],
            ['name' => 'Zayn Asyari, M.I.Kom', 'position' => 'Position', 'image' => 'team3.jpeg'],
            ['name' => 'Nur Hidayah Perwitasari', 'position' => 'Position', 'image' => 'team4.jpeg'],
            ['name' => 'Risty', 'position' => 'Position', 'image' => 'team5.jpeg'],
            ['name' => 'Reza', 'position' => 'Position', 'image' => 'team6.jpeg']
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
            ['type' => 'secondary', 'title' => 'Human Resources', 'description' => 'recruitment, career development, capacity buildings, performance evaluations and assessment, remuneration.', 'image' => 'training1.jpeg'],
            ['type' => 'secondary', 'title' => 'Training of Trainers', 'description' => 'Training Need Analysis, Syllabi, Material, Teaching Method, Evaluation Tools.', 'image' => 'training1.jpeg'],
        ];

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

        $values = [
            ['title' => 'Expert Instructors', 'description' => 'Instructors are seasoned practitioners in their respective fields.', 'image' => 'value_2.jpg'],
            ['title' => 'Balanced Training', 'description' => 'The training system is engaging with current content reflecting global communication trends, split evenly between theory and practice.', 'image' => 'value_1.jpg'],
            ['title' => 'Flexible Training', 'description' => 'Training schedules and locations are flexible to meet clients needs.', 'image' => 'value_2.jpg'],
        ];

        return view("pages.home", compact('teamMembers', 'trainings', 'clients', 'values'));
    }

    public function articles(){
        return view("pages.articles");
    }

    public function dashboard(){
        return view("pages.dashboard");
    }
}
