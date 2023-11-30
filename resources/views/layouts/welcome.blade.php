<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
     <header>

   
        <div center class="text-end">
          <a href="{{ route('home') }}" class="btn btn-outline-light me-2">Home</a>
    <!-- <a href="{{ route('/register') }}" class="btn btn-warning">Sign-up</a>-->
        </div>
      
 
  </div>
</header>
    </head>
   
<body class="bg-blue-900 text-blue-100 pt-20">


@section('content')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
-->
<div class="max-w-5xl mx-auto">
<div>

<form action="/tweets" method="POST" class="mb-20">
@csrf
<input type="text" name="body" class="mb-4 w-full p-2 border-2 border-blue-500 text-black" placeholder= "what's happening">
<button type="submit" class= "bg-yellow-300 text-gray-800 py-3 px-6 rounded-full">
Tweet 
</button>
</form> 
</div>
<div>  
@foreach ($tweets as $tweet)
<div class="border-b-2 text-black border-blue-500 p-2">
<form action="/tweets/{{$tweet ->id }}" method="POST"
class="flex space-x-2">
    @csrf
    @method('PUT')

<input type= "text" name="body" value ="{{ $tweet->body}}"
class= "bg-white py-2 px-4 rounded-full text black w-full">
<button type="submit" class="bg-blue-300 text-blue-900 py-3 
px-4 rounded-full text-black "> Edit </button>
</form>

<form action="/tweets/{{$tweet ->id }}" method="POST"
class="flex space-x-2">
    @csrf
    @method('DELETE')
<button type= "submit" class=" bg-orange-400 text-blue-900 py-3 px-4 rounded-full"> Delete</button>
</form>    
</div>
@endforeach
</div>  
</div>
</body>
@endsection
</html>
