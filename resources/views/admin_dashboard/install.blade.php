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
		<title>mycoupons.hk | Installation</title>
	</head>

    <body class="bg-login">
    	<!--wrapper-->
        <div class="wrapper">
            <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
                <div class="container-fluid">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                        <div class="col mx-auto">
                            <div class="mb-4 text-center">
                                <h2>DB Installation</h2>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        
                                        <div class="form-body">
                                            <form class="row g-3" method="POST" action="{{ route('install') }}" autocomplete='off'>
                                                @csrf
                                                <div class="col-12">
                                                    
                                                    <label for="inputEmailAddress" class="form-label">DB Username</label>
                                                    <input name='dbusername' type="text" value='{{ old("dbusername") }}' class="form-control" id="inputUsername" placeholder="DB Username">
                                                    
                                                    @error('dbusername')
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
                                                    
                                                    <label for="inputDBName" class="form-label">Database name</label>
                                                    <input name='dbname' type="text" value='{{ old("dbname") }}' class="form-control" id="inputDBName" placeholder="DB Name">
                                                    
                                                    @error('dbname')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                    
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-outline-primary"><i class="bx bxs-lock-open"></i>Install</button>
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
    </body>
</html>