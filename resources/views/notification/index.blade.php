<x-layouts.main>

    <x-page-header>

        <x-slot:name>
            {{$name='Posts info'}}
        </x-slot:name>

    </x-page-header>


        <!-- Blog Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row align-items-end mb-4">
                    <div class="col-lg-6">
                        <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Latest Blog</h6>
                        <h1 class="section-title mb-3">Last Posts</h1>
                    </div>
                </div>



                    @foreach ($notifications as $notification)

                    <div class=" rounded mb-3 border p-4">
                        <div class="position-relative mb-4">
                            @if ($notification->read_at==null)

                            <div class="blog-date">
                                    
                                
                                <h4 class="font-weight-bold mb-n1">New</h4>
                            </div>
                            @endif

                        </div>

                        <div class="d-flex mb-2">
                            <span class="text-danger "> Category:  </span>
                            <a class="text-success text-uppercase font-weight-medium">{{ $notification->data['created_at']}}</a>
                        </div>
                        <h5 class="font-weight-medium mb-2">{{ $notification->data['title']}}</h5>
                        <p class="mb-4">{{$notification->data['id']}}</p>
                        @if ($notification->read_at==null)
                        <a class="btn btn-sm btn-primary py-2" href="{{route('notification.read',['notification'=>$notification->id])}}">Read More</a>

                        @endif
                </div>
                    @endforeach





            </div>
        </div>
        <!-- Blog End -->
        <div class="row d-flex justify-content-center">
            {{$notifications->links()}}

        </div>

    </x-layouts.main>
