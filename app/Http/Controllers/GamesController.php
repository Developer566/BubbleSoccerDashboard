<?php

namespace App\Http\Controllers;

use App\Models\gamesModel;
use Illuminate\Http\Request;
use PDF;

class GamesController extends Controller
{
    public function showGamesList()
    {
        return view('Games.games');
    }
    public function showGamesForm()
    {
        return view('Games.addgame');
    }
    public function saveGames(Request $request)
    {

        // Validate the request data
        $validator = $request->validate([
            'game_title' => 'required',
            'content' => 'required',
            'content1' => 'required',
            'content2' => 'required'
        ]);


        if ($validator) {
            $games = new gamesModel();
            $data = [
                'game_title' => $request['game_title'],
                'event_description' => $request['content'],
                'whats_included' => $request['content1'],
                'additional_info' => $request['content2']
            ];

            $games->insert($data);
            session()->flash('success', 'Game data Saved');
            return redirect()->route('games.list');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    public function showGamesData(Request $request)
    {
        if ($request->ajax()) {

            $totalFilteredRecord = $totalDataRecord = $draw_val = "";
            $totalDataRecord = gamesModel::count();
            $totalFilteredRecord = $totalDataRecord;

            $limit_val = $request->length;
            $start_val = $request->start;
            $columnIndex = $request->order[0]['column'];
            $game_val = $request->columns[$columnIndex]['data'];
            $dir_val = $request->order[0]['dir'];

            if (empty($request->search['value'])) {
                $game_data = gamesModel::offset($start_val)->limit($limit_val)->orderBy($game_val, $dir_val)->get();
            } else {
                $search_text = $request->search['value'];

                $game_data = gamesModel::where('game_title', 'LIKE', "%{$search_text}%")

                    // ->orWhere('roles', 'LIKE', "%{$search_text}%")
                    ->offset($start_val)
                    ->limit($limit_val)
                    ->orderBy($game_val, $dir_val)
                    ->get();

                $totalFilteredRecord = gamesModel::where('game_title', 'LIKE', "%{$search_text}%")

                    // ->orWhere('roles', 'LIKE', "%{$search_text}%")
                    ->count();
            }
            $data_val = array();
            $html = '';
            if (!empty($game_data)) {
                foreach ($game_data as $game_val) {


                    $gamenestedData['game_title'] = "<strong>" . ucfirst($game_val->game_title) . "</strong>";
                    $gamenestedData['event_description'] = $game_val->event_description;
                    $gamenestedData['whats_included'] = $game_val->whats_included;
                    $gamenestedData['additional_info'] = $game_val->additional_info;
                    $html = ' <a href="' . route("show.edit.games", ["id" => $game_val->id]) . '" class="btn btn-info">Edit</a> ';
                    $html .= '<a href="' . route("game.delete", ["id" => $game_val->id]) . '"  onclick="return confirm(\'Are you sure you want to delete this Record?\')" class="btn btn-danger mt-2">Delete</a>';
                    $gamenestedData['action'] = $html;

                    $data_val[] = $gamenestedData;
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
    }
    public function showEditForm(Request $request)
    {
        $data = gamesModel::find($request['id']);
        return view('Games.editgame', ['data' => $data]);
    }
    public function updateGame(Request $request)
    {
        // Validate the request data
        $validator = $request->validate([
            'game_title' => 'required',
            'content' => 'required',
            'content1' => 'required',
            'content2' => 'required'
        ]);


        if ($validator) {
            $games = new gamesModel();
            $data = [
                'game_title' => $request['game_title'],
                'event_description' => $request['content'],
                'whats_included' => $request['content1'],
                'additional_info' => $request['content2']
            ];

            $games->where('id', $request['id'])->update($data);
            session()->flash('success', 'Game data updated');
            return redirect()->route('games.list');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    public function deleteGame(Request $request)
    {
        $data = gamesModel::find($request['id']);
        $data->delete();
        session()->flash('success', 'Game data Deleted');
        return redirect()->route('games.list');
    }
}
