<div class="card shadow-sm mt-3">
    <div class="card-header">
        <h5>Electronic Works Statistics</h5>
    </div>
    <div class="card-body">
        <h6><span>
                                    @for($i = 0; $i < 5; $i++)
                    <span><i class="fa{{$review_stats->sum('stars')/$review_stats->count()  <= $i ? 'r' : '' }} fa-star"></i></span>
                @endfor



                           </span>{{number_format($review_stats->sum('stars')/$review_stats->count(),1)}}/5 &nbsp;| &nbsp;{{$review_stats->count()}} Ratings</h6>
        <h6><span>100K</span> &nbsp;Visitors</h6>
        <h6><span>{{$writer_count}}</span> &nbsp;Active Writers</h6>
        <h6><span>{{$writer_count}}</span> &nbsp;Writers Currently Online</h6>
        <hr>

       @auth()
       <h4 style="font-size: 20px" class="m-3">Publish a Project<br>
       access high quality papers</h4>

     <a href="{{route('jobs.create')}}" class="btn btn-primary hire m-3 mb-4">Publish project</a>
           @else
            <h5 style="font-size: 24px">Sign up to<br>
                access high quality papers</h5>
            <a href="{{route('register')}}" class="btn btn-primary hire mt-3 mb-4">Click to Sign Up</a>
       @endauth

    </div>
</div>
