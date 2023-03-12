<x-layouts.main>
<x-slot:name>
{{$name="Edit Post"}}
</x-slot:name>
    <x-page-header>
    
        <x-slot:name>
            {{$name='Edit Post'}}
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
                        <form action="{{route('posts.update',['post'=>$post->id])}}" method="POST" enctype="multipart/form-data">
                            @method('PUT');
                            @csrf
                         
                            <div class="control-group">
                                <input type="text" class="form-control p-4" name="title" value="{{$post->title}}" placeholder="Title Name"   />
                                <p class="help-block text-danger"></p>
                                @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="control-group"> 
                                <textarea class="form-control p-4" rows="3" name="short_content" placeholder="Short Content" >{{$post->short_content}}</textarea>
                                <p class="help-block text-danger"></p>
                                @error('short_content')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="control-group">
                                <textarea class="form-control p-4" rows="3" name="content" placeholder="Content" >{{$post->content}}</textarea>
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
                            <div class="flax align-items-center justify-between">
                            <div>
                                <button class="btn btn-primary mt-4 " type="submit" >Submit</button>
                                
                            </div>
                            <div>
                                <a href="{{route('posts.show',['post'=>$post->id])}} " class="btn btn-danger mt-2">Back</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
    </div>  

    
</x-layouts.main>
