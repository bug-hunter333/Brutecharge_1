<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PageController extends Controller
{
    /**
     * Display the about us page.
     */
    public function about()
    {
        // Company statistics and data
        $companyData = [
            'founded' => '2020',
            'employees' => '150+',
            'charging_stations' => '500+',
            'happy_customers' => '50,000+',
            'cities_covered' => '25',
            'uptime_percentage' => '99.5',
            'years_experience' => Carbon::now()->year - 2020,
        ];

        // Team members data
        $teamMembers = [
            [
                'name' => 'John Doe',
                'position' => 'CEO & Founder',
                'initials' => 'JD',
                'bio' => 'Visionary leader with 15+ years in clean energy, driving innovation in sustainable charging solutions.',
                'linkedin' => 'https://linkedin.com/in/johndoe',
                'twitter' => 'https://twitter.com/johndoe'
            ],
            [
                'name' => 'Jane Smith',
                'position' => 'CTO',
                'initials' => 'JS',
                'bio' => 'Tech innovator specializing in IoT and smart grid technologies, architecting our cutting-edge charging infrastructure.',
                'linkedin' => 'https://linkedin.com/in/janesmith',
                'twitter' => 'https://twitter.com/janesmith'
            ],
            [
                'name' => 'Mike Brown',
                'position' => 'Head of Operations',
                'initials' => 'MB',
                'bio' => 'Operations expert ensuring seamless nationwide deployment and maintenance of our charging network.',
                'linkedin' => 'https://linkedin.com/in/mikebrown',
                'twitter' => 'https://twitter.com/mikebrown'
            ]
        ];

        // Company values
        $companyValues = [
            [
                'title' => 'Reliability',
                'description' => 'Dependable charging solutions you can trust, anytime, anywhere.',
                'icon' => 'check-circle'
            ],
            [
                'title' => 'Customer Focus',
                'description' => 'Every decision we make puts our customers\' needs first.',
                'icon' => 'users'
            ],
            [
                'title' => 'Innovation',
                'description' => 'Constantly pushing boundaries to create better solutions.',
                'icon' => 'lightbulb'
            ],
            [
                'title' => 'Sustainability',
                'description' => 'Committed to environmental responsibility in everything we do.',
                'icon' => 'heart'
            ]
        ];

        // Mission and vision
        $missionVision = [
            'mission' => 'To revolutionize electric vehicle charging infrastructure with cutting-edge technology, making sustainable transportation accessible to everyone.',
            'vision' => 'A world where clean, efficient transportation is the standard, powered by our innovative charging network.',
            'tagline' => 'Powering the future of electric mobility with innovative charging solutions'
        ];

        // Recent achievements or milestones
        $achievements = [
            [
                'year' => '2024',
                'title' => 'Reached 500+ Charging Stations',
                'description' => 'Expanded our network to serve more communities nationwide.'
            ],
            [
                'year' => '2023',
                'title' => 'Award for Innovation',
                'description' => 'Recognized as the most innovative EV charging company of the year.'
            ],
            [
                'year' => '2022',
                'title' => '50,000+ Happy Customers',
                'description' => 'Milestone achievement in customer satisfaction and trust.'
            ],
            [
                'year' => '2020',
                'title' => 'Company Founded',
                'description' => 'BruteCharge was established with a vision for sustainable transportation.'
            ]
        ];

        return view('about-us.index', compact(
            'companyData', 
            'teamMembers', 
            'companyValues', 
            'missionVision', 
            'achievements'
        ));
    }

    /**
     * Display the home page.
     */
    public function home()
    {
        $heroData = [
            'title' => 'Welcome to BruteCharge',
            'subtitle' => 'Leading the Future of Electric Vehicle Charging',
            'description' => 'Discover our innovative charging solutions designed for the modern world.'
        ];

        return view('pages.home', compact('heroData'));
    }

    /**
     * Display the team page.
     */
    public function team()
    {
        // Extended team data for dedicated team page
        $allTeamMembers = [
            [
                'name' => 'John Doe',
                'position' => 'CEO & Founder',
                'initials' => 'JD',
                'bio' => 'Visionary leader with 15+ years in clean energy, driving innovation in sustainable charging solutions.',
                'education' => 'MBA from Stanford, BS in Electrical Engineering from MIT',
                'experience' => '15+ years',
                'linkedin' => 'https://linkedin.com/in/johndoe',
                'twitter' => 'https://twitter.com/johndoe',
                'email' => 'john@brutecharge.com'
            ],
            [
                'name' => 'Jane Smith',
                'position' => 'CTO',
                'initials' => 'JS',
                'bio' => 'Tech innovator specializing in IoT and smart grid technologies, architecting our cutting-edge charging infrastructure.',
                'education' => 'PhD in Computer Science from Carnegie Mellon',
                'experience' => '12+ years',
                'linkedin' => 'https://linkedin.com/in/janesmith',
                'twitter' => 'https://twitter.com/janesmith',
                'email' => 'jane@brutecharge.com'
            ],
            [
                'name' => 'Mike Brown',
                'position' => 'Head of Operations',
                'initials' => 'MB',
                'bio' => 'Operations expert ensuring seamless nationwide deployment and maintenance of our charging network.',
                'education' => 'MS in Operations Management from Wharton',
                'experience' => '10+ years',
                'linkedin' => 'https://linkedin.com/in/mikebrown',
                'twitter' => 'https://twitter.com/mikebrown',
                'email' => 'mike@brutecharge.com'
            ],
            [
                'name' => 'Sarah Wilson',
                'position' => 'Head of Marketing',
                'initials' => 'SW',
                'bio' => 'Creative marketing strategist building brand awareness and customer engagement across all channels.',
                'education' => 'MBA in Marketing from Northwestern Kellogg',
                'experience' => '8+ years',
                'linkedin' => 'https://linkedin.com/in/sarahwilson',
                'twitter' => 'https://twitter.com/sarahwilson',
                'email' => 'sarah@brutecharge.com'
            ]
        ];

        return view('pages.team', compact('allTeamMembers'));
    }

    /**
     * Display the careers page.
     */
    public function careers()
    {
        $jobOpenings = [
            [
                'title' => 'Senior Software Engineer',
                'department' => 'Engineering',
                'location' => 'San Francisco, CA / Remote',
                'type' => 'Full-time',
                'description' => 'Join our engineering team to build next-generation charging solutions.',
                'requirements' => [
                    '5+ years of software development experience',
                    'Experience with Laravel, Vue.js, or React',
                    'Knowledge of IoT systems and APIs',
                    'Bachelor\'s degree in Computer Science or related field'
                ],
                'posted_date' => '2024-01-15'
            ],
            [
                'title' => 'Product Manager',
                'department' => 'Product',
                'location' => 'New York, NY',
                'type' => 'Full-time',
                'description' => 'Lead product strategy and development for our charging network platform.',
                'requirements' => [
                    '3+ years of product management experience',
                    'Experience in tech or automotive industry',
                    'Strong analytical and communication skills',
                    'MBA or equivalent experience preferred'
                ],
                'posted_date' => '2024-01-10'
            ],
            [
                'title' => 'Field Operations Technician',
                'department' => 'Operations',
                'location' => 'Multiple Locations',
                'type' => 'Full-time',
                'description' => 'Install, maintain, and troubleshoot charging stations across our network.',
                'requirements' => [
                    'Electrical or mechanical technical background',
                    'Valid driver\'s license and ability to travel',
                    'Strong problem-solving skills',
                    'Physical ability to work in various weather conditions'
                ],
                'posted_date' => '2024-01-08'
            ]
        ];

        $benefits = [
            'Competitive salary and equity package',
            'Comprehensive health, dental, and vision insurance',
            'Flexible work arrangements and remote options',
            'Professional development and learning opportunities',
            'Electric vehicle charging allowance',
            'Generous PTO and parental leave policies'
        ];

        return view('pages.careers', compact('jobOpenings', 'benefits'));
    }

    /**
     * Display contact page.
     */
    public function contact()
    {
        $contactInfo = [
            'headquarters' => [
                'address' => '123 Innovation Drive, San Francisco, CA 94105',
                'phone' => '+1 (555) 123-4567',
                'email' => 'info@brutecharge.com'
            ],
            'support' => [
                'phone' => '+1 (555) 987-6543',
                'email' => 'support@brutecharge.com',
                'hours' => '24/7 Customer Support'
            ],
            'business' => [
                'email' => 'partnerships@brutecharge.com',
                'phone' => '+1 (555) 456-7890'
            ]
        ];

        return view('pages.contact', compact('contactInfo'));
    }

    /**
     * Display privacy policy page.
     */
    public function privacy()
    {
        $lastUpdated = '2024-01-01';
        return view('pages.privacy', compact('lastUpdated'));
    }

    /**
     * Display terms of service page.
     */
    public function terms()
    {
        $lastUpdated = '2024-01-01';
        return view('pages.terms', compact('lastUpdated'));
    }
}