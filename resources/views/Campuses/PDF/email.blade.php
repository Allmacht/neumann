<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Ubuntu'">
    <div style="text-align: center !important;
                color: #fff !important; 
                background-color: #1A2B63 !important; 
                padding-top: 1rem !important; 
                padding-bottom: 1rem !important;">
        <h1>Neumann</h1>
    </div>
    <div style="margin-top: 1rem !important; 
                text-align: center !important;">
        <h2 style=" position: relative; 
                    padding: 0.75rem 1.25rem; 
                    margin-bottom: 1rem; 
                    border: 1px solid transparent; 
                    border-radius: 0.25rem;
                    color: #0c5460;
                    background-color: #d1ecf1; 
                    border-color: #bee5eb;">
            {{$data->title}}
        </h2>
        <p style="  font-size: 20px; 
                    padding-left: 100px; 
                    padding-right: 100px; 
                    padding-top: 1rem !important; 
                    padding-bottom: 1rem !important;">
            @if ($data->message)
                {{$data->message}}
            @else
                {{$data->title}}
            @endif
        </p>
        <div style="position: relative;
                    padding: 0.75rem 1.25rem;
                    margin-bottom: 1rem;
                    border: 1px solid transparent;
                    border-radius: 0.25rem;  color: #0c5460;
                    background-color: #d1ecf1;
                    border-color: #bee5eb;">
            <h3>{{$data->sender}}</h3>
            <p>{{$data->sender_email}}</p>
        </div>
    </div>
    <div style="text-align: center !important;  
                color: #fff !important; 
                background-color: #1A2B63 !important; 
                padding-top: 1rem !important;
                padding-bottom: 1rem !important;">
        <h5>{{__('© Neumann '.date('Y').". All rights reserved")}}</h5>
    </div>
</body>
</html>