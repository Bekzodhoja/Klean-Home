<x-layouts.main>
    <x-slot:name>
        {{$name='Create Posts'}}
    </x-slot:name>
    <x-page-header>

        <x-slot:name>
            {{$name='Create Posts'}}
        </x-slot:name>

    </x-page-header>



    <div class="container-fluid py-5 ">
        <div class="container text-center ">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title mb-3">Create new Post here</h1>
                </div>

            </div>

            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="control-group">
                                <input type="text" class="form-control p-4" name="title" value="{{old('title')}}" placeholder="Title Name"   />
                                <p class="help-block text-danger"></p>
                                @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div ontrol-group>
                                <select class="form-control p-4" name="category_id">
                                    <option value="">Categories</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control p-4 mt-2" rows="3" name="short_content" placeholder="Short Content" >{{old('short_content')}}</textarea>
                                <p class="help-block text-danger"></p>
                                @error('short_content')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="control-group">
                                <textarea class="form-control p-4" rows="3" name="content" placeholder="Content" >{{old('content')}}</textarea>
                                <p class="help-block text-danger"></p>
                                @error('content')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="control-group">
                                <input type="file" class="form-control p-4" name="photo"    />
                                <p class="help-block text-danger"></p>
                                @error('photo')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block py-3 px-5" type="submit" >Submit</button>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.main>
