<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Soccer</title>
    <link rel="stylesheet" href="{{ asset('/dist/css/bublestyle.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="digibackground mobile">
        <div class="top-header col-12">
            <h1 class="header center text-white text-center">
                Booking Request - REF-{{ $sentquote['ref_number'] }}
            </h1>
            <p class="head-text text-white text-center">Please check all the details below are correct before paying
                your
                deposit</p>
        </div>
        <div class="section no-pad-bot" id="index-banner">
            <div class="container accountforheader">
                <div class="row  m-0">
                    <div class="header col s12 text-color">

                        <table border="1" cellpadding="5" class="quotes">
                            <tr>
                                <td style="width: 20%;"><strong>Ref:</strong></td>
                                <td style="width: 80%;">{{ $sentquote['ref_number'] }}</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;"><strong>Name:</strong></td>
                                <td style="width: 80%;">{{ $sentquote['name'] }}</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;"><strong>Tel:</strong></td>
                                <td style="width: 80%;">{{ $sentquote['telephone'] }}</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;"><strong>Email:</strong></td>
                                <td style="width: 80%;">{{ $sentquote['email'] }}</td>
                            </tr>
                            <tr>
                                <td style="width:20%;"><strong>Age:</strong></td>
                                <td style="width:80%;">{{ $sentquote['age'] }}</td>
                            </tr>
                        </table>
                        {{-- @dd($sentquote) --}}
                        <table border="1" cellpadding="5" class="quotes mt-5">
                            <tr>
                                <td style="width: 20%;"><strong>Date:</strong></td>
                                <td style="width: 80%;">{{ $sentquote['day_of_week'] . ' ' . $sentquote['date'] }}</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;"><strong>Time:</strong></td>
                                <td style="width: 80%;">{{ $sentquote['time'] }}</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;"><strong>Location:</strong></td>
                                <td style="width: 80%;">{{ $sentquote['location'] }}</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;"><strong>Booking Type:</strong></td>
                                <td style="width: 80%;">
                                    {{ $sentquote['duration'] ?? $sentquote['activities'] }}

                                </td>
                            </tr>
                            {{-- @dd($sentquote, $sentquote['per_person_cost'], $sentquote['total_cost']) --}}
                            <tr>
                                <td style="width: 20%;"><strong>Players:</strong></td>
                                <td style="width: 80%;">{{ $sentquote['players'] }}

                                    @<span class="pound">£
                                    </span>
                                    {{ $sentquote['per_person_cost'] }} Per Person

                                </td>
                            </tr>
                            @if ($sentquote['total_cost'])
                                <tr>
                                    <td style="width: 20%;"><strong>Total Cost:</strong></td>
                                    <td style="width: 80%;"><span class="pound">£</span>
                                        {{ $sentquote['total_cost'] }}</td>
                                </tr>
                            @endif
                            @if ($sentquote['message'])
                                <tr>
                                    <td style="width: 20%;"><strong>Message:</strong></td>
                                    <td style="width: 80%;">{{ $sentquote['message'] }}</td>
                                </tr>
                            @endif
                        </table>
                        <!-- <input type='hidden' name='uid' value='5466625'>
                    <input type='text' name='search' value='' placeholder='Enter your town, postcode or area' style="color: #666;font-size: 0.8em;;width: 80%;display:inline-block;"/>
                    <button type='submit' value='' class="btn-large waves-effect waves-light white"><i class="large material-icons" style="color: #000000">trending_flat</i></button>
                     -->
                        <p class="deposit_text">I can confirm your booking when <span class="pound">£</span> <span
                                class="price">{{ $sentquote['deposit_fee'] }}</span>
                            deposit has been paid </p>
                        <div class="button text-center">
                            <a href="https://www.bubblesoccerworld.com/deposit.php" class=""> Pay Your

                                Deposit</a>
                        </div>
                        @if ($sentquote['remaining_option'] == '1')
                            <p>
                                14 days prior to the start date you will confirm any changes to the number of players
                                and the remaining balance will be due. You will receive your booking confirmation
                                usually within 24 hours of paying the deposit. Please note that bookings cannot be
                                guaranteed until the deposit has been paid, deposit/payments are non-refundable. If you
                                have any further questions don't hesitate to contact us. For a full list of Terms &
                                Conditions see website.
                            </p>
                        @elseif($sentquote['remaining_option'] == '2')
                            <p>
                                The remaining balance is paid at least 14 days before the start date & you will receive
                                your booking confirmation usually within 24 hours of paying the deposit. Please note
                                that bookings cannot be guaranteed until the deposit has been paid. If you have any
                                further questions don't hesitate to contact us. For a full list of Terms & Conditions
                                see website.
                            </p>
                        @elseif($sentquote['remaining_option'] == '3')
                            <p>
                                The remaining balance is paid cash on the day of your event & you will receive your
                                booking confirmation usually within 24 hours of paying the deposit. Please note that
                                bookings cannot be guaranteed until the deposit has been paid, deposits/payments are
                                non-refundable. If you have any further questions don’t hesitate to contact us. For a
                                full list of Terms & Conditions see website.

                                For any changes to the number of players, a minimum of 48 hours’ notice must be given.

                            </p>
                        @elseif($sentquote['remaining_option'] == '4')
                            <p>
                                The remaining balance is paid cash on the day of your event & you will receive your
                                booking confirmation usually within 24 hours of paying the deposit. Please note that
                                bookings cannot be guaranteed until the deposit has been paid, deposits/payments are
                                non-refundable. If you have any further questions don’t hesitate to contact us. For a
                                full list of Terms & Conditions see website.
                            </p>
                        @elseif($sentquote['remaining_option'] == '5')
                            <p>
                                Full payment is required to secure your event

                                I can confirm your booking when the full amount of <span>£</span>
                                {{ $sentquote['deposit_fee'] }} has been paid
                                You will receive your booking confirmation usually within 24 hours of making the
                                payment. Please note that bookings cannot be guaranteed until the payment has been paid,
                                deposits/payments are non-refundable. If you have any further questions don't hesitate
                                to contact us. For a full list of Terms & Conditions see website.

                            </p>
                        @endif
                    </div>


                </div>
            </div>
        </div>
        <div class="main">
            <div class="container accountforheader">
                <div class="row  m-0">
                    <div class="event">
                        <h1>Event Description</h1>
                        @foreach ($gamelist as $data)
                            <p>
                                {!! $data['event_description'] !!}
                            </p>
                        @endforeach
                    </div>
                    <div class="included event">
                        <h1>What’s Included</h1>
                        @foreach ($gamelist as $data)
                            <p>
                                {!! $data['whats_included'] !!}
                            </p>
                        @endforeach
                    </div>
                    <div class="event">
                        <h1>Additional Information</h1>
                        @foreach ($gamelist as $data)
                            <p>
                                {!! $data['additional_info'] !!}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-0 homepage-welcome-section">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <h1 class="">Welcome To Bubble Soccer World</h1>
                <h2 class="">Bubble Soccer World operates throughout the globe hosting zorbing football events
                    in Dublin, Belfast, London, Prague, Amsterdam, Vegas and many more venues throughout the U.K,
                    Ireland, Republic of Ireland, Europe & USA
                    <a class="hpvll" href="https://www.bubblesoccerworld.com/locations.php" target="blank"><br>View All
                        Locations</a>
                </h2>
            </div>
        </div>
    </div>
    <div class="row m-0 homepage-party-section">
        <div class="col  text-center">
            <h1>Book your Bubble Football event now!</h1>
            <h2>The goal of our Bubble Football events is to provide the customer with best possible experience and most
                fun, whether it's a stag/hen party, birthday bash or a group of like minded friends looking for a few
                laughs: you are guaranteed to cry with laughter from start to finish because there ain't not party like
                a Bubble Soccer party!.</h2>
        </div>
    </div>
    <div class="row homepage-party-section m-0">
        <div class="col-lg-4  general">
            <a href="">
                <img src="{{ asset('dist/img/site-icon-list-about-5asides.jpg') }}" alt="5 A Sides" />
            </a>
            <a href="">
                <h1 class="text-dark">General Parties</h1>
            </a>
            <a href="">
                <p class="text-dark"> Looking for a game of football with a fun twist? Then look no further because
                    you've came to the right place.</p>
            </a>
            <a href="">
                <p class="text-dark">We host Zorbing Football events all over the world including venues in London,
                    Vegas, Los Angeles, Dublin, Belfast, Amsterdam, Prague and many more
                </p>
            </a>
        </div>
        <div class="col-lg-4 text-white general">
            <a href="">
                <img class="text-center" src="{{ asset('dist/img/site-icon-list-about-stag.jpg') }}"
                    alt="5 A Sides" />
            </a>
            <a href="">
                <h1 class="text-dark">Stag & Hen Parties</h1>
            </a>
            <a href="">
                <p class="text-dark"> Planning a stag or hen weekend and stuck for ideas? Well look no further because
                    Bubble Soccer World has it all, fun, laughter, excitement and most importantly...memories to last a
                    lifetime.</p>
            </a>
            <a href="">
                <p class="text-dark"> Bubble Soccer World staff are on hand to assist in making your event as memorable
                    and enjoyable as possible with our tailor made packages</p>
            </a>
        </div>
        <div class="col-lg-4 text-white general">
            <a href="">
                <img class="text-center" src="{{ asset('dist/img/site-icon-list-about-parties.jpg') }}"
                    alt="5 A Sides" />
            </a>
            <a href="">
                <h1 class="text-dark">Kids Birthday Parties</h1>
            </a>
            <a href="">
                <p class="text-dark"> Attention all parents! Let us ease the stress of organising your little cherubs
                    birthday bash here at Bubble Soccer World.</p>
            </a>
            <a href="">
                <p class="text-dark">We host Zorbing Football events all over the world including venues in London,
                    Vegas, Los Angeles, Dublin, Belfast, Amsterdam, Prague and many more
                </p>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row home-party-section-2  m-0 ">
            <div class="col-lg-6 text-white general">
                <a href="">
                    <img class="text-align-center" src="{{ asset('/dist/img/site-icon-list-about-corporate.jpg') }}"
                        alt="5 A Sides" />
                </a>
                <a href="">
                    <h1 class="text-dark">Corporate Events & Gala Days</h1>
                </a>
                <a href="">
                    <p class="text-dark"> Bubble Soccer World is a sure fire way to have your
                        staff/customers/colleagues
                        in fits of laughter from beginning to end.
                    </p>
                </a>
            </div>
            <div class="col-lg-6 text-white general">
                <a href="">
                    <img class="text-center" src="{{ asset('dist/img/site-icon-list-about-school.jpg') }}"
                        alt="5 A Sides" />
                </a>
                <a href="">
                    <h1 class="text-dark">School Events</h1>
                </a>
                <a href="">
                    <p class="text-dark"> Pupils v Teachers...need I say anymore? We can bring the zorbing fun to your
                        school events.
                    </p>
                </a>
                <a href="">
                    <p class="text-dark">Bubble Soccer World can host your special school event and make sure its one
                        to remember.</p>
                </a>
            </div>
        </div>
    </div>

</body>

</html>
