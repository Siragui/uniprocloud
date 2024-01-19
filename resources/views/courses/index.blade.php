@extends('layouts.app')

@section('content')

<style>
    .card {
    margin-top: 2em;
    padding: 1.5em 0.5em 0.5em;
    border-radius: 2em;
    text-align: center;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  }
  .card img {
    width: 65%;
    border-radius: 50%;
    margin: 0 auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }
  .card .card-title {
    font-weight: 700;
    font-size: 1.5em;
  }
  .card .btn {
    border-radius: 2em;
    background-color: teal;
    color: #ffffff;
    padding: 0.5em 1.5em;
  }
  .card .btn:hover {
    background-color: rgba(0, 128, 128, 0.7);
    color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }

  p {
    display: -webkit-box;
   -webkit-box-orient: vertical;
   -webkit-line-clamp: 5;
   overflow: hidden;

}
</style>

<div class="jumbotron container">
    <h3 class="display-6 text-danger ">Page des cours  </h3>
    <p class="lead">Retrouver ici tout vos cours publié par vos professeurs .</p>
    <hr class="my-4">

    @if (Auth::user()->roles == 1 || Auth::user()->roles == 2 )
    {{-- si l'utilisateur a le role 1 ou 2  --}}
      <a class=" btn btn-danger rounded" href="{{ route('courses.create') }}" role="button">Publier un cours</a>

      @endif

      @if (session()->has('message'))

    <div class="alert alert-danger mt-2" role="alert">

        {{session()->get('message')}}
    </div>
    <hr class="my-4">
    @endif
  </div>


  <div class="container mt-4">
    <form action="/search" class="d-flex align-items-center justify-content-center">
        @csrf
      <input class="form-control me-2 w-50" type="search" name="q" id="q"  placeholder="Php, MySQL, Java..." aria-label="Search">
      <button class="btn btn-danger" type="submit">  Rechercher</button>
    </form>
  </div>

  <div class="container mt-5">
    <div class="container overflow-hidden text-center">
        <div class="row gy-5">
            @foreach ($courses as $course )
            <div class="col-4">
          <div class="p-3 border bg-light">
            <!-- card -->
            <div class="card" style="width: 18rem;">
              <img src="/course/logo/{{$course->logo}}" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">{{$course->title}}</h5>
                <p class="card-text h-50">
                    {{$course->body}}

                </p>
                <div>

                    publié par :
                    <span class="fst-italic text-muted">{{$course->user->name}}</span>
                </div>

                {{-- <embed src="/course/{{$course->pdf}}"  type='application/pdf'/> --}}

                <a href="/courses/{{$course->slug}}" class="btn mt-2">ouvrir</a>
                <hr>
            </div>
        </div>

    </div>
</div>
@endforeach
</div>

</div>
</div>




          @endsection
