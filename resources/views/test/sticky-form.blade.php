<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sticky Form</title>

        <!-- Fonts -->

        <!-- Styles -->
        <style>
            
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .sticky {
                border: 1px solid green;
                position: -webkit-sticky;
                position: sticky;
                top: 10px;
                display: inline-block;
                width: 200px;
            }
            
            .non-sticky {
                display: inline-block;
                border: 1px solid red;
                height: 1400px;
                width: 200px;
            }
        </style>
    </head>
    <body class="">
        <div class="sticky">
            <form action="{{route('donation.store', ['campaignId' => 1])}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="">
                            <input type="text" name="amount" class="form-control" placeholder="Enter Donation Amount"  value="">
                        </div>
                    </div><!-- ends col -->
                    <div class="col-12 mt-5">
                        <div class="quick-amount">
                            <input type="text" name="quick-amount" class="form-control" placeholder="Enter Donation Amount"  value="">
                        </div>
                    </div><!-- ends col -->
                    <div class="col-12 mt-3">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-pills btn-primary">Donate</button>
                        </div>
                    </div><!-- ends col -->
                </div>
            </form>
        </div>
        <div class="non-sticky">
            this is other
        </div>
    </body>
</html>
