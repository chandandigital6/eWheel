@extends('layouts.aap')

@section('content')
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @elseif(session('success'))
        <div class="alert alert-primary">
            {{ session('success') }}
        </div>
    @endif
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                  
                    <div class="small-box bg-info">
                        <div class="inner">
                            {{-- <h3>{{$upcommingPost}}</h3> --}}

                            <p>Upcoming Post</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                   
                    <div class="small-box bg-success">
                        <div class="inner">
                            {{-- <h3>{{$blog}}</h3> --}}

                            <p>Blog Category</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    {{-- @php
                        $team=\App\Models\Team::count();
                    @endphp --}}
                    <div class="small-box bg-warning">
                        <div class="inner">
                            {{-- <h3>{{$team}}</h3> --}}

                            <p>Team Member</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    {{-- @php
                        $services=\App\Models\Service::count();
                    @endphp --}}
                    <div class="small-box bg-danger">
                        <div class="inner">
                            {{-- <h3>{{$services}}</h3> --}}

                            <p>Number of Services</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    {{-- @php
                        $testimonial=\App\Models\Testimonial::count();
                    @endphp --}}
                    <div class="small-box bg-danger">
                        <div class="inner">
                            {{-- <h3>{{$testimonial}}</h3> --}}

                            <p>Number of Testimonial</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    {{-- @php
                        $article=\App\Models\article::count();
                    @endphp --}}
                    <div class="small-box bg-warning">
                        <div class="inner">
                            {{-- <h3>{{$article}}</h3> --}}

                            <p>Number of Article</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
