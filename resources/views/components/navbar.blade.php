<nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
    <a href="" class="navbar-brand d-block d-lg-none">
        <h1 class="m-0 display-4 text-primary">Klean</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            <a href="/" class="nav-item nav-link active">Home</a>
            <a href="{{route('about')}}" class="nav-item nav-link">About</a>
            <a href="{{route('service')}}" class="nav-item nav-link">Service</a>
            <a href="{{route('project')}}" class="nav-item nav-link">Project</a>
            <a href="{{route('posts.index')}}" class="nav-item nav-link">Latest Posts</a>
            <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
        </div>

        @auth
        <div class="mr-4">
            <a href="{{ route('notification.index') }}" class="btn btn-primary">
                <svg class="svg-icon" viewBox="0 0 20 20">
                    <path d="M14.38,3.467l0.232-0.633c0.086-0.226-0.031-0.477-0.264-0.559c-0.229-0.081-0.48,0.033-0.562,0.262l-0.234,0.631C10.695,2.38,7.648,3.89,6.616,6.689l-1.447,3.93l-2.664,1.227c-0.354,0.166-0.337,0.672,0.035,0.805l4.811,1.729c-0.19,1.119,0.445,2.25,1.561,2.65c1.119,0.402,2.341-0.059,2.923-1.039l4.811,1.73c0,0.002,0.002,0.002,0.002,0.002c0.23,0.082,0.484-0.033,0.568-0.262c0.049-0.129,0.029-0.266-0.041-0.377l-1.219-2.586l1.447-3.932C18.435,7.768,17.085,4.676,14.38,3.467 M9.215,16.211c-0.658-0.234-1.054-0.869-1.014-1.523l2.784,0.998C10.588,16.215,9.871,16.447,9.215,16.211 M16.573,10.27l-1.51,4.1c-0.041,0.107-0.037,0.227,0.012,0.33l0.871,1.844l-4.184-1.506l-3.734-1.342l-4.185-1.504l1.864-0.857c0.104-0.049,0.188-0.139,0.229-0.248l1.51-4.098c0.916-2.487,3.708-3.773,6.222-2.868C16.187,5.024,17.489,7.783,16.573,10.27"></path>
                </svg>
                
                <span class="badge badge-light">{{ auth()->user()->unreadNotifications()->count() }}</span>
                <span class="sr-only">unread messages</span>
              </a>
        </div>
        <div>
            <h5 class="p-4">{{ auth()->user()->name }}</h5>
        </div>
        <a href="{{route('posts.create')}}" class="btn btn-primary mr-3 d-none d-lg-block">Create Post</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger mr-3 d-none d-lg-block">Logout</button>


        </form>
        @else
        <a href="{{ route('login') }}" class="btn btn-primary mr-3 d-none d-lg-block">Login</a>

        @endauth
    </div>
</nav>
