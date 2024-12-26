@extends('layouts.aap')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update about data</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="{{route('about.update',$about->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if($about->image)
                                    <img src="{{ asset('storage/'.$about->image) }}" alt="Post Image" style="max-width: 200px;">
                                @else
                                    <p>No image available</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" value="{{$about->title}}" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="heading">heading:</label>
                                <input type="text" class="form-control" id="heading" value="{{$about->heading}}" name="heading" required>
                            </div>
                            <div class="form-group">

                                <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description">{{$about->description}}</textarea>

                            </div>
                            {{--                            <div class="form-group">--}}

                            {{--                                <label for="category">Category</label>--}}
                            {{--                                <select name="blog_category_id" id="" class="form-control">--}}

                            {{--                                    @if($category->isNotEmpty())--}}
                            {{--                                        @foreach($category as $data)--}}
                            {{--                                            <option value="{{$data->id}}">{{$data->category_name}}</option>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    @else--}}
                            {{--                                        <h1>no category</h1>--}}
                            {{--                                    @endif--}}
                            {{--                                </select>--}}

                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="date">Date:</label>--}}
                            {{--                                <input type="date" class="form-control" id="date" name="date">--}}
                            {{--                            </div>--}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
