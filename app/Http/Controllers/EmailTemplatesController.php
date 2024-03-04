<?php

namespace App\Http\Controllers;

use App\Models\emailTemplatesModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class EmailTemplatesController extends Controller
{
    public function showTemplates(Request $request)
    {
        if ($request->ajax()) {

            $totalFilteredRecord = $totalDataRecord = $draw_val = "";
            $totalDataRecord = emailTemplatesModel::count();
            $totalFilteredRecord = $totalDataRecord;

            $limit_val = $request->length;
            $start_val = $request->start;
            $columnIndex = $request->order[0]['column'];
            $quote_val = $request->columns[$columnIndex]['data'];
            $dir_val = $request->order[0]['dir'];

            if (empty($request->search['value'])) {
                $quote_data = emailTemplatesModel::offset($start_val)->limit($limit_val)->orderBy($quote_val, $dir_val)->get();
            } else {
                $search_text = $request->search['value'];

                $quote_data = emailTemplatesModel::where('mail_subject', 'LIKE', "%{$search_text}%")
                    ->orWhere('purpose', 'LIKE', "%{$search_text}%")
                    // ->orWhere('roles', 'LIKE', "%{$search_text}%")
                    ->offset($start_val)
                    ->limit($limit_val)
                    ->orderBy($quote_val, $dir_val)
                    ->get();

                $totalFilteredRecord = emailTemplatesModel::where('mail_subject', 'LIKE', "%{$search_text}%")
                    ->orWhere('purpose', 'LIKE', "%{$search_text}%")
                    // ->orWhere('roles', 'LIKE', "%{$search_text}%")
                    ->count();
            }
            $data_val = array();
            $html = '';
            if (!empty($quote_data)) {
                foreach ($quote_data as $quote_val) {


                    $quotenestedData['purpose'] = "<strong>" . ucfirst($quote_val->purpose) . "</strong>";
                    $quotenestedData['mail_subject'] = str_replace(' - Ref: {refNumber}', '', $quote_val->mail_subject);
                    $quotenestedData['is_active'] = $quote_val->is_active == '1' ? '<i class="fas fa-check" title="Active" style="color: #07df20;"></i>' : '<i class="fas fa-times" title="Inactive" style="color: #f50000;"></i>';

                    $html = ' <a href="' . route("show.edit.templates", ["id" => $quote_val->id]) . '" class="btn btn-info">Edit</a> ';
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
    }
    public function showEditTemplates(Request $request)
    {
        $id = $request['id'];
        $emaildata = emailTemplatesModel::find($id);

        return view('EmailTemplates.editEmailTemplates', ['data' => $emaildata]);
    }
    public function showEmailTemplates(Request $request)
    {
        return view('EmailTemplates.emailTemplates');
    }
    public function showCreateEmailForm()
    {
        return view('EmailTemplates.addTemplate');
    }
    public function saveTemplates(Request $request)
    {
        $emailTemplatesModel = new emailTemplatesModel();
        $data = [
            'purpose' => $request['purpose'],
            'body' => $request['content'],
            'mail_subject' => $request['email_title'],
            'is_active' => $request['status']
        ];
        // Validate the request data
        $validator = $request->validate([
            'purpose' => 'required',
            'email_title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required'
        ]);

        if ($validator) {

            $emailTemplatesModel->insert($data);
            session()->flash('success', 'Email Template Saved');
            return redirect()->route('email.templates');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    public function updateTemplates(Request $request)
    {
        $data = [
            'purpose' => $request['purpose'],
            'body' => $request['content'],
            'mail_subject' => $request['email_title'],
            'is_active' => $request['status']
        ];
        // dd($data);
        // Validate the request data
        $validator = $request->validate([
            'purpose' => 'required',
            'email_title' => 'required|string|max:255',
            'content' => 'required|string',

        ]);
        if ($validator) {
            $emailTemplate = emailTemplatesModel::findOrFail($request['id']);
            $emailTemplate->update($data);


            session()->flash('success', 'Email Template updated');
            return redirect()->route('email.templates');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
