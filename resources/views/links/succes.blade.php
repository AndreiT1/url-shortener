
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Code Challenge : URL Shortener </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/css/main.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
            <div class="content">
                
                   <h1> Code Challange : URL Shortener</h1>
                
                   <a class="btn btn-primary" href="{{action('LinksController@show',['hash'=>$link->hash])}}">
                    {{action('LinksController@show',['hash'=>$link->hash])}}
                </a>
               
            </div>
               
            </div>
        </div>
    </body>
</html>
