<x-auth-layout>

    <div class="row h-screen w-full">
        <div class="flex flex-col justify-between col-md-4 bg-gray-800 text-white">
            <div></div>
            <h1>Logo</h1>
            <h1>MUTU <br/>
            MUNISI APP</h1>
        </div>
        <div class="col-md-8 flex justify-center content-center items-center">
            <div class="card w-[500px]">
                <div class="card-body">
                    <h2 class="login-box-msg ">Login</h2>
                    <form action="/login" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="username" name="username" class="form-control form-control-lg" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </form>

                </div>

            </div>
        </div>
    </div>


    {{--    <div class="login-wrapper">--}}
    {{--                <div class="login-logo">--}}
    {{--                    <a href="../../index2.html"><b>Admin</b>LTE</a>--}}
    {{--                </div>--}}


    {{--    </div>--}}
</x-auth-layout>

