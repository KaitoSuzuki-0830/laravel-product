@extends('layouts.app')
@section('content')
<div class="card-body">
    @if(count($groups) > 0)
     <table class="table table-bordered">
     <thead>
        <tr>
          <th>イメージ</th>
          <th>タイトル</th>
          <th colspan="2">編集</th>
        </tr>
     </thead>
     <tbody>

    @foreach($groups as $group)
        <tr>
           <td><img src="{{ $group->featured }}" alt="{{ $group->name }}" height="90px" width="90px"style="border-radius: 80%"></td>
           <td>{{ $group->name}}</td>
           <td><a href="{{ route('groups.show',['id'=>$group->id])}}" class="btn btn-primary"><i class="far fa-eye"></i></a></td>
           <td>
             <form action="{{ route('groups.destroy',['id' => $group->id])}}" method="groups">
               @csrf
               @method('DELETE')
               <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
             </td>
        </tr>
       @endforeach
     </tbody>
     </table>
  @else
     <P class ="text-center">グループはありません</p>
  @endif
  </div>
  </div>
 @endsection

