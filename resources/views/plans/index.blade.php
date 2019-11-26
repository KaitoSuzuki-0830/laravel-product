@extends('layouts.app')
@section('content')
<div class="card-body">
    <h1>イベント　一覧</h1>
    @if(count($plans) > 0)
     <table class="table table-bordered">
     <thead>
        <tr>
          <th>イメージ</th>
          <th>タイトル</th>
          <th>場所</th>
          <th>値段</th>
          <th>詳細</th>
          <th>削除</th>
         </tr>
     </thead>
     <tbody>

      @foreach($plans as $plan)
        <tr>
           <td> <img src="{{ asset('uploads/plans/'.$plan->featured)}}" alt="{{ $plan->title }}" height="90px" width="90px"style="border-radius: 80%"></td>
           <td>{{ $plan->title}}</td>
           <td>Prefecture</td>
           <td>¥ {{$plan->price}}</td>
           <td><a href="{{ route('plans.show',['id'=>$plan->id])}}" class="btn btn-primary"><i class="far fa-eye"></i></a></td>
           <td>
             <form action="{{ route('plans.destroy',['id' => $plan->id])}}" method="post">
               @csrf
               @method('DELETE')
               <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
             </td>
        </tr>
       @endforeach
     </tbody>
     </table>
   @else
     <P class ="text-center">イベントはありません</p>
  @endif
  </div>
  </div>

 @endsection
