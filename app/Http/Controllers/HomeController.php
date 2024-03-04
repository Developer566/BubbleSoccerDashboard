<?php

namespace App\Http\Controllers;

use App\Models\contactformModel;
use App\Models\quoteModel;
use App\Models\sentQuotesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contactdata = contactformModel::count();
        $totalquoterequest = quoteModel::count();
        $totalsinglesentquote = sentQuotesModel::where('mail_subject', 'World Booking Enquiry')->count();
        $totalmultisentquote = sentQuotesModel::where('mail_subject', 'World Multi Activity Booking Enquiry')->count();

        $totalsingleactivity = quoteModel::where('mail_subject', 'World Booking Enquiry')->count();
        $totalmultiactivity = quoteModel::where('mail_subject', 'World Multi Activity Booking Enquiry')->where('activities', '!=', '')->count();
        $activities = [
            ['1 Hour Bubble Football, 1 Hour Combat Archery'],
            ['1 Hour Bubble Football, 1 Hour Goggle Football'],
            ['1 Hour Bubble Football, 1 Hour Dodgeball'],
            ['1 Hour Bubble Football, 1 Hour Sports Day'],
            ['1 Hour Bubble Football, 1 Hour Football Darts'],
            ['1 Hour Combat Archery, 1 Hour Goggle Football'],
            ['1 Hour Combat Archery, 1 Hour Dodgeball'],
            ['1 Hour Combat Archery, 1 Hour Sports Day'],
            ['1 Hour Combat Archery, 1 Hour Football Darts'],
            ['1 Hour Goggle Football, 1 Hour Dodgeball'],
            ['1 Hour Goggle Football, 1 Hour Sports Day'],
            ['1 Hour Goggle Football, 1 Hour Football Darts'],
            ['1 Hour Dodgeball, 1 Hour Sports Day'],
            ['1 Hour Dodgeball, 1 Hour Football Darts'],
            ['1 Hour Sports Day, 1 Hour Football Darts'],
            ['1 Hour Bubble Football, 1 Hour Combat Archery, 1 Hour Goggle Football'],
            ['1 Hour Bubble Football, 1 Hour Combat Archery, 1 Hour Dodgeball'],
            ['1 Hour Bubble Football, 1 Hour Combat Archery, 1 Hour Sports Day'],
            ['1 Hour Bubble Football, 1 Hour Combat Archery, 1 Hour Football Darts'],
            ['1 Hour Bubble Football, 1 Hour Goggle Football, 1 Hour Dodgeball'],
            ['1 Hour Bubble Football, 1 Hour Goggle Football, 1 Hour Sports Day'],
            ['1 Hour Bubble Football, 1 Hour Goggle Football, 1 Hour Football Darts'],
            ['1 Hour Bubble Football, 1 Hour Dodgeball, 1 Hour Sports Day'],
            ['1 Hour Bubble Football, 1 Hour Dodgeball, 1 Hour Football Darts'],
            ['1 Hour Bubble Football, 1 Hour Sports Day, 1 Hour Football Darts'],
            ['1 Hour Combat Archery, 1 Hour Goggle Football, 1 Hour Dodgeball'],
            ['1 Hour Combat Archery, 1 Hour Goggle Football, 1 Hour Sports Day'],
            ['1 Hour Combat Archery, 1 Hour Goggle Football, 1 Hour Football Darts'],
            ['1 Hour Combat Archery, 1 Hour Dodgeball, 1 Hour Sports Day'],
            ['1 Hour Combat Archery, 1 Hour Dodgeball, 1 Hour Football Darts'],
            ['1 Hour Combat Archery, 1 Hour Sports Day, 1 Hour Football Darts'],
            ['1 Hour Goggle Football, 1 Hour Dodgeball, 1 Hour Sports Day'],
            ['1 Hour Goggle Football, 1 Hour Dodgeball, 1 Hour Football Darts'],
            ['1 Hour Goggle Football, 1 Hour Sports Day, 1 Hour Football Darts'],
            ['1 Hour Dodgeball, 1 Hour Sports Day, 1 Hour Football Darts'],
            ['1 Hour Bubble Football, 1 Hour Combat Archery, 1 Hour Goggle Football, 1 Hour Dodgeball'],
            ['1 Hour Bubble Football, 1 Hour Combat Archery, 1 Hour Goggle Football, 1 Hour Sports Day'],
            ['1 Hour Bubble Football, 1 Hour Combat Archery, 1 Hour Goggle Football, 1 Hour Football Darts'],
            ['1 Hour Bubble Football, 1 Hour Combat Archery, 1 Hour Dodgeball, 1 Hour Sports Day'],
            ['1 Hour Bubble Football, 1 Hour Combat Archery, 1 Hour Dodgeball, 1 Hour Football Darts'],
            ['1 Hour Bubble Football, 1 Hour Combat Archery, 1 Hour Sports Day, 1 Hour Football Darts'],
            ['1 Hour Bubble Football, 1 Hour Goggle Football, 1 Hour Dodgeball, 1 Hour Sports Day'],
            ['1 Hour Bubble Football, 1 Hour Goggle Football, 1 Hour Dodgeball, 1 Hour Football Darts'],
            ['1 Hour Bubble Football, 1 Hour Goggle Football, 1 Hour Sports Day, 1 Hour Football Darts'],
            ['1 Hour Bubble Football, 1 Hour Dodgeball, 1 Hour Sports Day, 1 Hour Football Darts'],
            ['1 Hour Combat Archery, 1 Hour Goggle Football, 1 Hour Dodgeball, 1 Hour Sports Day'],
            ['1 Hour Combat Archery, 1 Hour Goggle Football, 1 Hour Dodgeball, 1 Hour Football Darts'],
            ['1 Hour Combat Archery, 1 Hour Goggle Football, 1 Hour Sports Day, 1 Hour Football Darts'],
            ['1 Hour Combat Archery, 1 Hour Dodgeball, 1 Hour Sports Day, 1 Hour Football Darts'],
            ['1 Hour Goggle Football, 1 Hour Dodgeball, 1 Hour Sports Day, 1 Hour Football Darts'],
            ['1 Hour Bubble Football, 1 Hour Combat Archery, 1 Hour Goggle Football, 1 Hour Dodgeball, 1 Hour Sports Day, 1 Hour Football Darts']
        ];
        $countByCombination = [];
        foreach ($activities as $combination) {
            $count = quoteModel::where('activities', $combination[0])->count();
            if ($count > 0) {
                $countByCombination[] = [
                    'activities' => $combination,
                    'count' => $count,
                ];
            }
        }

        usort($countByCombination, function ($a, $b) {
            return $b['count'] <=> $a['count'];
        });


        $titles = [
            'Bubble Football - 1 Hour',
            'Bubble Football - 2 Hours',
            'Bubble Football - 90 Minutes',
            'Goggle Football - 1 Hour',
            'Goggle Football - 2 Hours',
            'Goggle Football - 90 Minutes',
            'Combat Archery - 1 Hour',
            'Combat Archery - 2 Hours',
            'Combat Archery - 90 Minutes',
            'Dodgeball - 1 Hour',
            'Dodgeball - 2 Hours',
            'Dodgeball - 90 Minutes',
            'Football Darts - 1 Hour',
            'Football Darts - 2 Hours',
            'Football Darts - 90 Minutes',
            'Sports Day - 1 Hour',
            'Sports Day - 2 Hours',
            'Sports Day - 90 Minutes',
        ];

        $data = [];

        foreach ($titles as $title) {
            $count = quoteModel::where('duration', $title)->count();
            if ($count > 0) {
                $data[] = ['title' => $title, 'count' => $count];
            }
        }

        usort($data, function ($a, $b) {
            return $b['count'] <=> $a['count'];
        });

        return view(
            'home',
            [

                'contactcount' => $contactdata,
                'quoterequest' => $totalquoterequest,
                'singlesentquote' => $totalsinglesentquote,
                'multisentquote' => $totalmultisentquote,
                'singleactivity' => $totalsingleactivity,
                'multiactivity' => $totalmultiactivity,
                'data' => $data,
                'countByCombination' => $countByCombination
            ]
        );
    }
}
