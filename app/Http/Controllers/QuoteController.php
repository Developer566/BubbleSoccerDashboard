<?php

namespace App\Http\Controllers;

use App\Models\gamesModel;
use App\Models\quoteMetaModel;
use App\Models\quoteModel;
use App\Models\sentQuotesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\emailTemplatesModel;
use Illuminate\Support\Facades\Mail;
use App\Jobs\mailjob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class QuoteController extends Controller
{
    public function getQuoteData(Request $request)
    {
        $data = $request->json()->all();
        // Log::info('Received data: ' . json_encode($data['Tel']));
        fetchAndSaveData($data);
        // return redirect()->route('show.quotedata')->with('success', 'Data Saved Successfully');
    }
    public function showQuoteData()
    {
        // $lastRefNumber = quoteModel::all();
        // dd($lastRefNumber);
        $games = gamesModel::all();
        return view('Quote.quoteData', ['games' => $games]);
    }
    public function allQuoteData(Request $request)
    {
        if ($request->ajax()) {

            $totalFilteredRecord = $totalDataRecord = $draw_val = "";
            $totalDataRecord = quoteModel::count();
            $totalFilteredRecord = $totalDataRecord;

            $limit_val = $request->length;
            $start_val = $request->start;
            $columnIndex = $request->order[0]['column'];
            $quote_val = $request->columns[$columnIndex]['data'];
            $dir_val = $request->order[0]['dir'];

            if (empty($request->search['value'])) {
                // $quote_data = quoteModel::offset($start_val)->limit($limit_val)->orderBy($quote_val, $dir_val)->get();
                $quote_data = quoteModel::offset($start_val)->limit($limit_val)->orderBy($quote_val, 'DESC')->get();

            } else {
                $search_text = $request->search['value'];

                $quote_data = quoteModel::where('mail_subject', 'LIKE', "%{$search_text}%")

                    ->orWhere('name', 'LIKE', "%{$search_text}%")
                    ->orWhere('ref_number', 'LIKE', "%{$search_text}%")
                    ->orWhere('location', 'LIKE', "%{$search_text}%")
                    ->offset($start_val)
                    ->limit($limit_val)
                    ->orderBy($quote_val, $dir_val)
                    ->get();

                $totalFilteredRecord = quoteModel::where('mail_subject', 'LIKE', "%{$search_text}%")
                    ->orWhere('name', 'LIKE', "%{$search_text}%")
                    ->orWhere('ref_number', 'LIKE', "%{$search_text}%")
                    ->orWhere('location', 'LIKE', "%{$search_text}%")
                    ->count();
            }
            $data_val = array();

            if (!empty($quote_data)) {
                foreach ($quote_data as $quote_val) {

                    $html = '';
                    $sentdata = sentQuotesModel::where('ref_number', $quote_val->ref_number)->first();
                    $quotenestedData['id'] = $quote_val->id;
                    $quotenestedData['mail_subject'] = $quote_val->mail_subject;
                    $quotenestedData['ref_number'] = $quote_val->ref_number;
                    $quotenestedData['name'] = $quote_val->name;
                    $quotenestedData['telephone'] = $quote_val->telephone;
                    $quotenestedData['players'] = $quote_val->players;
                    $quotenestedData['date'] = $quote_val->date;
                    $quotenestedData['day_of_week'] = $quote_val->day_of_week;
                    // $quotenestedData['time'] = $quote_val->time;
                    // $quotenestedData['age_group'] = $quote_val->age;
                    // $quotenestedData['activities'] = $quote_val->activities;
                    $quotenestedData['location'] = $quote_val->location;
                    // $quotenestedData['duration'] = $quote_val->duration;
                    $html = '<a href="' . route("get.single.quote.data", ['id' => $quote_val->id]) . '" data-id="' . $quote_val->id . '" class="btn btn-xs rounded btn-success ml-2 px-2 quote-data"> View </a>';
                    // if ($sentdata) {
                    //     $html .= '<a href="#" onclick="alert(\'Quote has been sent already\');" class="btn btn-xs rounded btn-info ml-2 px-2">Quote Sent</a>';
                    // }
                    if ($sentdata && $sentdata['is_sent'] == true) {
                        $html .= '<a href="#"  data-sid="' . $sentdata->id . '"  class="btn btn-xs rounded btn-info ml-2 px-2 send-quote">Quote Sent</a>';
                    } else {
                        $html .= '<a href="#" data-sid="" data-id="' . $quote_val->id . '"  class="btn btn-xs rounded btn-primary ml-2 px-2 send-quote">Send Quote</a>';
                    }
                    $quotenestedData['action'] = $html;
                    $data_val[] = $quotenestedData;

                }
            }
            $draw_val = $request->input('draw');
            $get_json_data = array(
                "draw" => intval($draw_val),
                "recordsTotal" => intval($totalDataRecord),
                "recordsFiltered" => intval($totalFilteredRecord),
                "data" => $data_val
            );

            return response()->json($get_json_data);
        }
        return view('Quote.quoteData');
    }
    public function getSingleQuoteData(Request $request)
    {
        $data = quoteModel::find($request['id']);
        $metadata = quoteMetaModel::where('quote_id', $request['id'])->get();

        $datalist = [];
        $datalist[0] = $data;
        $datalist[1] = $metadata;

        return $datalist;
    }

    public function showQuotePage(Request $request)
    {
        $decodeid = Crypt::decryptString($request['id']);
        $encodekey = env('ENCODE_KEY');
        $id = str_replace($encodekey, '', $decodeid);

        $data = quoteModel::find($id);
        $sentquote = sentQuotesModel::where('quote_id', $id)->first();
        $gamelist = [];
        if (isset($sentquote['game_selection'])) {
            if (strpos($sentquote['game_selection'], ',') !== false) {
                $gameSelection = explode(',', $sentquote['game_selection']);
            } else {
                $gameSelection = [$sentquote['game_selection']];
            }
            foreach ($gameSelection as $game) {

                $gamelist[] = gamesModel::find($game);
            }
        }
        // $gameSelection = explode(',', $sentquote['game_selection']);
        // dd($sentquote);

        // Your further logic goes here
        // $startTime = Carbon::createFromFormat('H', $data['time']);

        // $adjustedTime = $startTime->subMinutes(15);

        // Get the adjusted time in the format 'H:i'
        // $adjustedTimeString = $adjustedTime->format('H:i');
        // dd($gamelist, '$sentquote:' . $sentquote['game_selection'], $data['duration'] ? 'Multi Activity Events:' . $data['duration'] : 'Multi Activity Events:' . $data['activities'], 'Booking Reference:' . $data['ref_number'], 'Lead Customer' . $data['name'], 'Destination:' . $data['location'], 'Event Date:' . $data['day_of_week'] . ' ' . $data['date'], 'Start Time:' . $data['time'], 'Arrive Time:' . $adjustedTimeString, 'Approx Group Size:' . $data['players'], 'Price Per Person:' . $sentquote['per_person_cost'] ?? '');
        $viewData = [
            'id' => $id,
            'gamelist' => $gamelist,
            'sentquote' => $sentquote,
            // 'atime' => $adjustedTimeString,
            'data' => $data
        ];
        // Pass the data to the view
        return view('Quote.quote', $viewData);
        // return view('Quote.quote', ['id' => $id, 'game' => $gamelist]);
    }
    public function getQuoteRefData(Request $request)
    {
        // dd($request['id']);
        $sdata = sentQuotesModel::find($request['id']);
        $datalist = [];
        if (isset($sdata) && $sdata != '') {
            $datalist[0] = $sdata;
        } else {
            $data = quoteModel::find($request['id']);
            $metadata = quoteMetaModel::where('quote_id', $request['id'])->get();

            $datalist[0] = $data;
            $datalist[1] = $metadata;
        }

        return $datalist;
    }
    public function sendQuoteMail(Request $request)
    {
        // dd($request->all());
        //send mail to customer for availability
        $data = quoteModel::where('ref_number', $request['qid'])->first();
        $metadata = quoteMetaModel::where('quote_id', $data['id'])->get();
        $encodekey = env('ENCODE_KEY');
        $encodeid = $data['id'] . $encodekey;
        $id = Crypt::encryptString($encodeid);
        $bookinglink = 'http://127.0.0.1:8000' . '/bubble/quote/' . $id;


        $templates = new emailTemplatesModel();
        $template = $templates::where('purpose', 'Availability Mail')->get();
        if (isset($template[0]['is_active']) && $template[0]['is_active'] == '1') {
            $details['content'] = $template[0]['body'];
            $details['content'] = str_replace('{refNumber}', $data['ref_number'], $details['content']);
            $details['content'] = str_replace('{customerName}', $data['name'], $details['content']);
            $details['content'] = str_replace('{bookingLink}', $bookinglink, $details['content']);
            $details['subject'] = str_replace('{refNumber}', $data['ref_number'], $template[0]['mail_subject']);
            // $details['email'] = 'garywmcshane@gmail.com';
            // $details['bcc'] = 'myworkmail800@gmail.com';
            // $details['cc'] = 'hello@bubblesoccerworld.com';
            $details['email'] = 'myworkmail800@gmail.com';
            $details['bcc'] = 'myworkmail800@gmail.com';
            $details['cc'] = 'myworkmail800@gmail.com';
            // dd($details);
            // return view('EmailTemplates.mail', ['details' => $details]);
            dispatch(new mailjob($details));
            sentQuotesModel::where('ref_number', $request['qid'])->update([
                'is_sent' => true
            ]);
            session()->flash('success', 'Quote Mail Processed');
        }
        return redirect()->route('show.quotedata');

    }

}
