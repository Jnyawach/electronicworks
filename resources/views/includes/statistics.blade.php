<div class="card shadow-sm mt-3">
    <div class="card-header">
        <h5>Electronic Works Statistics</h5>
    </div>
    <div class="card-body">
        <h6><span>
                                    @for($i = 0; $i < 5; $i++)
                    <span><i class="fa{{$reviews->sum('stars')/$reviews->count()  <= $i ? 'r' : '' }} fa-star"></i></span>
                @endfor



                           </span>{{number_format($reviews->sum('stars')/$reviews->count(),1)}}/5 &nbsp;| &nbsp;{{$reviews->count()}} Ratings</h6>
        <h6><span>100K</span> &nbsp;Visitors</h6>
        <h6><span>{{$writer}}</span> &nbsp;Active Writers</h6>
        <h6><span>{{$writer}}</span> &nbsp;Writers Currently Online</h6>
        <hr>
        <h5 style="font-size: 24px">Sign up to<br>
            access high quality papers</h5>
        <a href="{{route('register')}}" class="btn btn-primary hire mt-3 mb-4">Click to Sign Up</a>
    </div>
</div>
