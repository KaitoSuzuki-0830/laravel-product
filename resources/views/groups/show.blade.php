@extends('layouts.app')
@section('content')
<body>
    <div class="container">
    <div class="row" id="groupshow">
        <div class="col-sm-8">
            <img src="{{ $group->featured }}" alt="{{ $group->title }}" height="350px" width="100%">
        </div>
        <div class="col-sm-4">
            <h1>{{ $group->name}}</h1>
            <p></p>
            <p><i class="fas fa-user"></i> {{ $organiser->name}}</p>
            <p><i class="fas fa-tag"></i> {{ $group->category->name}}</p>
            <p><i class="fas fa-home"></i> {{ $group->created_at}}</p>
            <p></p>
            <p><iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Flaravel-myproduct.herokuapp.com%2Fgroup%2F%7B%7Bgroup-%3Eid%7D%7D&layout=button&size=large&appId=467764400530816&width=79&height=28" width="79" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></p>
            <p></p>
            <p><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="Relaccumで新しいグループに参加しました！　みんなもRelaccumを使ってみよう！" data-hashtags="relaccum #リレキューム　#Relaccum #グループ　#仲間募集中　#簡単参加" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></p>
            <p><a href="{{ route('group.join',['group_id'=>$group->id,'id'=>Auth::id()])}}" class="btn btn-danger" role="button"><i class="fas fa-plus-circle fa-1x">Join</i></a></p>
        </div>
    </div>
<hr>

    <div class="row">
        <div class="col-sm-8">
            <h5 class="text-center">グループ概要</h5>
            <p>{{ $group->description}}</p>
        </div>
        <div class="col-sm-4">
            <h6>代表者</h6>
            <p>{{ $organiser->name }}</p>
            <h6>メンバー(Count)一覧</h6>
            <p><i class="fas fa-users"></i></p>
        </div>
    </div>
<hr>
    <div class="row">
        <div class="col-sm-8">
            <h5 class="text-center">イベントリスト</h5>
            @foreach($group->plans as $plan)
                <div class="card" style="width:100%;">
                    <img src="{{ $plan->featured }}" class="card-img-top" alt="{{$plan->title}}" height="200px" width="200px">
                        <div class="card-body">
                            <div class="card-title"><h3>{{$plan->title}}</h3></div>
                            {{-- <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{$plan->prefecture->name}}</p> --}}
                            <p class="card-text"><i class="far fa-map"></i> {{$plan->place}}</p>
                            <p class="card-text"><i class="fas fa-tag"></i> {{$group->category->name}}</p>
                            <p class="card-text">{{$plan->description}}</p>
                            <p class="card-text"><i class="fas fa-yen-sign"></i> {{$plan->price}}
                                <form action="{{ route('pay') }}" method="POST">
                                    {{ csrf_field() }}
                                    <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="pk_test_EtHmYNmqSKAqc3JTRo7H98vx003VgTohui"
                                        data-amount="{{$plan->price}}"
                                        data-name="参加費を支払う"
                                        data-label="参加する"
                                        data-description="Laravel-Myproduct.payment"
                                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                        data-locale="auto"
                                        data-currency="JPY">
                                    </script>
                                </form>
                            </p>
                        </div>
                    </div>
            @endforeach
            </div>
        <div class="col-sm-4"></div>
    </div>
<hr>
    <div class="col-md-12 ">
     <div id="disqus_thread">
     {{-- 　　ディスカッションページ --}}
        <script>

        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://myproduct.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        {{-- 　　ディスカッションページ　ここまで --}}
        </div>
        </div>
    </div>
</body>
@endsection
