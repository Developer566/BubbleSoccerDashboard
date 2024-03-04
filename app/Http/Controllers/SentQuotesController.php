<?php

namespace App\Http\Controllers;

use App\Models\quoteMetaModel;
use App\Models\quoteModel;
use App\Models\sentQuotesModel;

use Illuminate\Http\Request;

class SentQuotesController extends Controller
{
    public function saveSentquotes(Request $request)
    {
        $sentquote = new sentQuotesModel();
        // $data = quoteModel::find($request['ref']);
        $data = quoteModel::where('ref_number', $request['ref'])->first();
        $metadata = quoteMetaModel::where('quote_id', $data['id'])->get();
        // dd($metadata);
        // Check in sentquotes table if ref_number already exists, then update

        $sentquotes = sentQuotesModel::where('ref_number', $data['ref_number'])->first();
        if ($sentquotes) {
            $sentquotes->update([
                'quote_id' => $data['id'],
                'mail_subject' => $data['mail_subject'],
                'email' => $request['email'],
                'name' => $request['name'],
                'players' => $request['players'],
                'date' => $request['date'],
                'day_of_week' => $request['dayofweek'],
                'time' => $request['time'],
                'age' => $request['age'],
                'telephone' => $request['tel'],
                'duration' => $request['duration'],
                'location' => $request['location'],
                'activities' => $request['activities'],
                'ref_number' => $data['ref_number'],
                'total_cost' => $request['totalcost'],
                'per_person_cost' => $request['perperson'],
                'deposit_fee' => $request['depositfee'],
                'event_type' => $request['eventtype'],
                'duedate' => $request['duedate'],
                'message' => $request['message'],
                'remaining_option' => $request['remaining_option'],
                'game_selection' => !empty($request['gameselection']) ? implode(',', $request['gameselection']) : null
            ]);

            session()->flash('success', 'Sent Quote Data updated');
        } else {
            $userEmail = null;
            // dd($metadata);
            foreach ($metadata as $meta) {
                if ($meta->key === 'Email') {
                    $userEmail = $meta->value;

                }
                if ($meta->key === 'Message') {
                    $msg = $meta->value;

                }
            }
            $sentquote->quote_id = $data['id'];
            $sentquote->email = $userEmail;
            $sentquote->mail_subject = $data['mail_subject'];
            $sentquote->name = $data['name'];
            $sentquote->players = $data['players'];
            $sentquote->date = $data['date'];
            $sentquote->day_of_week = $data['day_of_week'];
            $sentquote->time = $data['time'];
            $sentquote->age = $data['age'];
            $sentquote->telephone = $data['telephone'];
            $sentquote->duration = $data['duration'];
            $sentquote->location = $data['location'];
            $sentquote->activities = $data['activities'];
            $sentquote->ref_number = $data['ref_number'];
            $sentquote->total_cost = $request['totalcost'];
            $sentquote->per_person_cost = $request['perperson'];
            $sentquote->deposit_fee = $request['depositfee'];
            $sentquote->event_type = $request['eventtype'];
            $sentquote->duedate = $request['duedate'];
            $sentquote->remaining_option = $request['remaining_option'];
            $sentquote->message = $msg;
            $sentquote->game_selection = !empty($request['gameselection']) ? implode(',', $request['gameselection']) : null;

            $sentquote->save();

            session()->flash('success', 'Sent Quote Saved');
        }

        return redirect()->route('show.quotedata');
    }
}
