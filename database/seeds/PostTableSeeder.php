<?php

use App\User;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        $users = User::getAll();

        DB::table('posts')->insert(
            [
                'user_id' => $users[0]['id'],
                'active' => true,
                'title' => 'Crowdfunding to make small business Pozible',
                'body' => 'Rick Chen is the founder of local crowdfunding platform Pozible which has been running for five years. He explains: “Crowdfunding is a way to pull money from the internet for a particular initiative from a group or people of individual. People can get their project off the ground without traditional funding or grants”.

Microfinance or peer-to-peer lending isn’t a new idea- there are recorded instances of this kind of finance back in the 1700s. But it was with the launch of Kickstarter in 2009, that the use of the term ‘crowdfunding’ became popular. While the funding on Kickstarter was crowdsourced, people who contributed would receive ‘rewards’ according to the level that they donated at. Project creators set up a page, outlined their ideas and often made a video explaining their goals.

Crowdfunding quickly became popular with artists and creatives who wanted a way to create budgets for film, art, theatre or music projects. As rewards, they could offer tickets, previous works or bespoke creative experiences for their audience. Creating work became a lot less stressful when artists knew they could cover their costs and even make money.',
                'published_at' => new DateTime('2017-05-30')
            ]);
        DB::table('posts')->insert([
            'user_id' => $users[1]['id'],
            'active' => true,
            'title' => 'Working with a web designer',
            'body' => 'If you want a simple and comparatively cheap website, then you should have your business logo and any photos and web copy ready for the web developer, as that may help keep costs down.

Other developers will want to work closely with you on your branding and strategy before they start building. “We don’t actually talk about the content or the logos, the colours, the theme or anything like that until we have nutted out a strategy for the website and a way for it to be successful,” says Bianca Board, one of the founders of Web123.',
            'published_at' => new DateTime('2017-06-30')
        ]);
        DB::table('posts')->insert([
            'user_id' => $users[2]['id'],
            'active' => false,
            'title' => 'How the co-founders of MiGoals start their days',
            'body' => 'Setting goals since he was a teenager, Adam Jelic founded Melbourne based stationery and inspiration brand Mi Goals with graphic designer Alec Kach in 2011 as a way to realise the products he always wished existed.

The minimal design and candid motivation slogans splayed across their journals has seen the product range stocked nationally and internationally, as well as proliferate our Instagram feeds. But what’s been most exciting for the two co-founders is being able to quit their full-time day jobs at the start of this year to work on the business.',
            'published_at' => new DateTime('2017-07-30')
        ]);
    }
}
