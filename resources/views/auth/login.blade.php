<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--favicon-->
		<link rel="icon" href="{{ asset('assets/images/icons/favicon.svg') }}" type="image/svg" />
		<!-- loader-->
		<link href="admin_assets/css/pace.min.css" rel="stylesheet" />
		<script src="admin_assets/js/pace.min.js"></script>
		<!-- Bootstrap CSS -->
		<link href="admin_assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
		<link href="admin_assets/css/app.css" rel="stylesheet">
		<link href="admin_assets/css/icons.css" rel="stylesheet">
		<title>mycoupons.hk | Admin Login</title>
	</head>

    <body class="bg-login">
    	<!--wrapper-->
        <div class="wrapper">
            <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
                <div class="container-fluid">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                        <div class="col mx-auto">
                            <div class="mb-4 text-center">
                                <img src="{{ asset('assets/images/mycoupons.hk_1.svg') }} " width="180" alt="" />
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        
                                        <div class="form-body">
                                            <form class="row g-3" method="POST" action="{{ route('login') }}" autocomplete='off'>
                                                @csrf
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                    <input name='email' type="email" value='{{ old("email") }}' class="form-control" id="inputEmailAddress" placeholder="Email Address">
                                                    
                                                    @error('email')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                    
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input name='password' type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    </div>
                                                    @error('inputChoosePassword')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-outline-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    	<!--end wrapper-->
    
    	<!--plugins-->
    	<script src="admin_assets/js/jquery.min.js"></script>
    
        <script>
            $(document).ready(function () {
                $("#show_hide_password a").on('click', function (event) {
                    event.preventDefault();
                    if ($('#show_hide_password input').attr("type") == "text") {
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass("bx-hide");
                        $('#show_hide_password i').removeClass("bx-show");
                    } else if ($('#show_hide_password input').attr("type") == "password") {
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass("bx-hide");
                        $('#show_hide_password i').addClass("bx-show");
                    }
                });
            });
        </script>
    </body>
</html>