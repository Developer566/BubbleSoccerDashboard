<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456789'),
                'created_at' => now(),
                'updated_at' => now()
            ],

        ];

        DB::table('users')->insert($users);

        //         DB::table('email_templates')->insert(
//             [
//                 0 => [
//                     'purpose' => 'Auto Responsder Mail',
//                     'mail_subject' => 'Checking Availability - Bubble Soccer World - Ref: {refNumber}',
//                     'is_active' => 0,
//                     'body' => "<body>
//                             <p>Hi {customerName}, </p><br>
//                             <h3 style='margin-left:100px;'><b>Thank you for your enquiry, we're now checking availability :)</b></h3><br>
//                             <p>We aim to send you an update within a few hours during weekdays, slightly longer if evening / weekend. (Don't forget to check your spam / junk folder)</p><br>
//                             <p>
//                             <a href='#' style='text-decoration:none;'>
//                             Original Enquiry
//                             </a><br><br>

        //                             <b>Ref:</b> {refNumber} <br>
//                             <b>Name:</b> {name} <br>
//                             <b>Tel:</b> {telephone} <br>
//                             <b>Email:</b> {email} <br>
//                             <b>Date:</b> {date} <br>
//                             <b>Time:</b> {time} <br>
//                             <b>Age:</b> {age} <br>
//                             <b>Location:</b> {location} <br>
//                             <b>Booking Type:</b> Multi Activity - {bookingType} <br>
//                             <b>Players:</b> {players} @ £45 Per Person <br>
//                             <b>Message:</b> {message} <br>

        //                             </p>
//                     </body>",
//                     'variables' => '{customerName} | {refNumber} | {name} | {telephone} | {email} |{date} |{time} |{age} |{location} |{bookingType} |{players} |{message}'
//                 ],
//                 1 => [
//                     'purpose' => 'Availability Mail',
//                     'mail_subject' => 'Booking Request - Bubble Soccer World - Ref: {refNumber}',
//                     'is_active' => 0,
//                     'body' => "<body>
//                         <p>
//                         Hi {customerName},<br>

        //                         <h3 style='margin-left:300px;'><b>It’s Good news, we’re available! Now let’s get you booked in</b></h3><br>

        //                         The link below provides you with your very own personal event page, here you will find details of your enquiry, pricing & description of what you’re booking. You can then secure your booking via the deposit / payment options.
// <br>
//                         <p style='margin-left:350px;'>(MY ENQUIRY - Ref: {refNumber})</p>
//                         <p style='margin-left:320px;'><a href='{bookinLink}' style='text-decoration:'none';'>“Link to customers personal booking page”</a></p><br>

        //                         If you need to make any changes or have any questions, then please reply to this email. If you prefer you can speak to us on <strong>0800 689 3081</strong>.

        //                         </p>
//                     </body>",
//                     'variables' => '{customerName} | {refNumber} | {bookingLink}'
//                 ]
//             ]
//         );

    }
}
