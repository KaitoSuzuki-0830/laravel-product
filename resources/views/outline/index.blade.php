@extends('layouts.app')
@section('content')
<header>
<div class="input-group bg-dark text-white p-2">
    {{-- Search box  --}}
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <form action="/search" method="get">
          <div class="input-group">
              <input type="search" name="search" class="form-control">
              <span class="input-group-prepend">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
              </span>
          </div>
        </form>
    </div>
    <div class="col-md-1"></div>
</div>
</header>

<main>
<div class="row">
    <div class="col-md-10"><h3>グループ</h3></div>
    <div class="col-md-2"><a href="{{route('groups.index')}}"><h5>See all</h5></a></div>
</div>

@foreach($groups as $group)
  <div class="d-inline-block">
  <div class="card-deck" style="width:24.5rem;">
    <a href="{{route('groups.show',['id'=>$group->id])}}" class="card">
    <img src="{{asset($group->featured)}}" class="card-img" alt="{{$group->name}}" height="200px" width="200px">
    <div class="card-img-overlay">
        <div class="card-title"><h3>{{$group->name}}</h3></div>
        <p class="card-text"><i class="fas fa-users"></i> members</p>
        <p class="card-text"><i class="fas fa-tag"></i>{{$group->category->name}}</p>
        <p class="card-text"><i class="fas fa-plus-circle fa-2x"></i></p>
    </div>
    </a>
    </div>
</div>
@endforeach
<hr>
<div class="row">
    <div class="col-md-10"><h3>Category</h3></div>
    <div class="col-md-2"><a href="{{route('category.index')}}"><h5>See all</h5></a></div>
    {{-- リンク先をcategories.indexにかえる --}}
</div>

@foreach($categories as $category)
    <div class="d-inline-block">
        <div class="card-deck" style="width:19rem;">
            <a href="#" class="card">
                <img src="#" alt="#" class="card-img" height="150px" width="150px">
                <div class="card-img-overlay">
                    <h3>{{$category->name}}</h3>
                    <p class="card-text"><i class="fas fa-users"></i> Group's count</p>
                </div>
            </a>
        </div>
    </div>
@endforeach
</main>

<footer>
    <div class="container-fluid">
        <div class="input-group bg-dark p-5">
            <a href="/about">使い方</a>
        <hr>
        <tbody class="row">
            <tbody class="col-md-8">
                <thead>
                    <th>アカウント</th>
                    <th>探す・作る</th>
                    <th>サービス</th>
                </thead>
                <tbody>
                    <td><a href="">Sign up</a></td>
                    <td><a href="">グループ</a></td>
                    <td><a href="">About</a></td>
                    <td><a href="">Log in</a></td>
                    <td><a href="">イベント</a></td>
                    <td><a href="">Contact</a></td>
                    <td><a href=""></a></td>
                    <td><a href="">カテゴリー</a></td>
                    <td><a href=""></a></td>
                    </tbody>
            </tbody>
            <div class="col-md-4">
                <thead>
                    <th>Follow us</th>
                </thead>
            </div>
        </tbody>

        <hr>
            <small>©︎ Relaccum 2019 ・　KaitoSuzuki</small>
            <p>Terms of Service ・ Privacy Policy ・ Cookie Policy</p>
        </div>
    </div>
</footer>
@endsection
