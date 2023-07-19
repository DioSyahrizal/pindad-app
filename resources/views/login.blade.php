<x-layout>
    <div class="login-wrapper">
        {{--        <div class="login-logo">--}}
        {{--            <a href="../../index2.html"><b>Admin</b>LTE</a>--}}
        {{--        </div>--}}

        <div class="card">
            <div class="card-body">
                <p class="login-box-msg">Sign in</p>
                <form action="/login" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
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
</x-layout>
