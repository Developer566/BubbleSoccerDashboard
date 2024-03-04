<?php
// In your helper file (e.g., app/helpers.php)

use App\Mail\autorespondermail;
use App\Models\contactformModel;
use App\Models\emailTemplatesModel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\quoteModel;
use Illuminate\Support\Facades\Mail;
use App\Jobs\mailjob;

if (!function_exists('fetchAndSaveData')) {
    function fetchAndSaveData($data)
    {

        $date = Carbon::createFromFormat('d F, Y', $data['Date']);

        $dayOfWeek = $date->format('l');


        if (isset($data['Duration'])) {
            $combo = explode("Location:", $data['Duration']);
            $duration = trim($combo[0]);

            // Extracting location
            $location = str_replace('Location:', '', trim($combo[1]));
            $age = $data['Age'];
        } else {
            $comboage = explode("Location:", $data['Age']);
            $age = trim($comboage[0]);
            $location = str_replace('Location:', '', trim($comboage[1]));
            $duration = '';
        }

        $lastRefNumber = quoteModel::max('ref_number');

        // Determine the starting value for ref_number
        $ref = ($lastRefNumber >= 10000) ? ($lastRefNumber + 1) : 10000;

        $adjustedData = [
            'mail_subject' => $data['Mail_subject'],
            'name' => $data['Name'],
            'players' => $data['Players'],
            'date' => $data['Date'],
            'day_of_week' => $data['DayOfWeek'] ?? $dayOfWeek,
            'time' => $data['Time'],
            'age' => $age ?? '',
            'telephone' => $data['Tel'],
            'duration' => $duration,
            'location' => $location ?? '',
            'activities' => $data['Activities'] ?? '',
            'ref_number' => $ref
        ];
        $quote = quoteModel::create($adjustedData);

        $adjustedmetaData = [
            'quote_id' => $quote->id,
            'email_from' => $data['Email_from'] ?? '',
            'email_to' => $data['Email_to'] ?? '',
            'user_email' => $data['Email'],
            'message' => $data['Message']
        ];
        $key = ['Email_from', 'Email_to', 'Email', 'Message'];
        $quote_id = $quote->id;

        foreach ($key as $index => $field) {
            \App\Models\quoteMetaModel::create([
                'key' => $field,
                'value' => $data[$field],
                'quote_id' => $quote_id
            ]);
        }

        $templates = new emailTemplatesModel();
        $template = $templates::where('purpose', 'Auto Responsder Mail')->get();
        if (isset($template[0]['is_active']) && $template[0]['is_active'] == '1') {
            $bookingType = (isset($data['Activities']) && $data['Activities'] !== '') ? ("Multi Activity - " . $data['Activities']) : ($duration);


            $details['content'] = $template[0]['body'];
            $details['content'] = str_replace('{customerName}', $data['Name'], $details['content']);
            $details['content'] = str_replace('{refNumber}', $ref, $details['content']);
            $details['content'] = str_replace('{name}', $data['Name'], $details['content']);
            $details['content'] = str_replace('{telephone}', $data['Tel'], $details['content']);
            $details['content'] = str_replace('{email}', $data['Email'], $details['content']);
            $details['content'] = str_replace('{date}', $dayOfWeek . ', ' . $data['Date'], $details['content']);
            $details['content'] = str_replace('{time}', $data['Time'], $details['content']);
            $details['content'] = str_replace('{age}', $age, $details['content']);
            $details['content'] = str_replace('{location}', $location ?? '', $details['content']);
            $details['content'] = str_replace('{bookingType}', $bookingType, $details['content']);
            $details['content'] = str_replace('{players}', $data['Players'], $details['content']);
            $details['content'] = str_replace('{message}', $data['Message'], $details['content']);
            $details['subject'] = str_replace('{refNumber}', $ref, $template[0]['mail_subject']);
            // $details['email'] = 'myworkmail800@gmail.com';
            $details['email'] = $data['Email'];
            $details['bcc'] = 'myworkmail800@gmail.com';
            $details['cc'] = 'hello@bubblesoccerworld.com';
            // $details['email'] = 'sohail.devp@gmail.com';
            // Mail::to($details['email'])->send(new autorespondermail($details));

            dispatch(new mailjob($details));
        }
        $ref++;
        return true;

    }
}
if (!function_exists('fetchAndSaveContactData')) {
    function fetchAndSaveContactData($data)
    {

        $contactData = [
            'full_name' => $data['Name'],
            'email' => $data['Email'],
            'contact_number' => $data['Tel'],
            'message' => $data['Message']
        ];
        $contactdata = contactformModel::create($contactData);
        return true;

    }
}
