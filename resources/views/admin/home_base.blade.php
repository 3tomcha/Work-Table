@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                <table>
                    <tr>
                        @yield('td1')
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            @yield('td2')
                        </tr>
                    @endforeach
                </table>

                <?php dd($holidays); ?>
            </div>
        </div>
    </div>
</div>
@endsection