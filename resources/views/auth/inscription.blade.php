<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Inscription</title>
</head>
<body>
<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <img class="mx-auto h-12 w-auto" src="../images/logo2.png" alt="Workflow">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Créer un compte et devenez annonceur</h2>
      
    </div>
    <form class="mt-8 space-y-6" action="{{route('registeruser')}}" method="POST">
        @if(Session::has('success')) 
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail')) 
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
      <input type="hidden" name="remember" value="true">
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="name" class="sr-only">Nom Complet</label>
          <input id="name" name="name" type="text" autocomplete="Nom Complet" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Votre nom complet" value="{{old('name')}}">
        <span class="text-danger">@error('name') {{$message}} @enderror</span>
        </div>
        
        <div>
          <label for="birthday" class="sr-only">Date de naissance</label>
          <input id="birthday" name="birthday" type="date" autocomplete="birthday" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Votre date de naissance" value="{{old('birthday')}}">
          <span class="text-danger">@error('birthday') {{$message}} @enderror</span>
        </div>
        <div>
          <label for="phone" class="sr-only">Téléphone</label>
          <input id="phone" name="phone" type="text" autocomplete="phone"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Votre téléphone" value="{{old('phone')}}">
        </div>
        <div>
          <label for="mail" class="sr-only">Adresse email</label>
          <input id="mail" name="mail" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Votre Email" value="{{old('mail')}}">
          <span class="text-danger">@error('mail') {{$message}} @enderror</span>
        </div>
        <div>
          <label for="password" class="sr-only">Mot de passe</label>
          <input id="password" name="password" type="password"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Mot de passe">
          <span class="text-danger">@error('password') {{$message}} @enderror</span>
        </div>
        <div>
          <label for="password2" class="sr-only">Mot de passe</label>
          <input id="password2" name="password2" type="password"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Retapez le mot de passe">
        </div>
    </div>

      <div class="flex items-center justify-between">
        

        <div class="text-sm">
          <a href="../" class="font-medium text-indigo-600 hover:text-indigo-500"> Déjà inscrit ?</a>
        </div>
      </div>

      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: solid/lock-closed -->
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
          Inscrivez-vous
        </button>
      </div>
    </form>
  </div>
</div>
@include('sweetalert::alert')
</body>
</html>