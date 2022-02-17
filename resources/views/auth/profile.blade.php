@extends("layouts.master")

@section("content")


<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3">
        <div class="card">
            <div class="card-body">
                <center class="mt-4"> <img src="../../images/users/1.jpg"
                        class="rounded-circle" width="150" />
                    <h4 class="card-title mt-2">{{$userdata->name}}</h4>
                    <h6 class="card-subtitle">Membre depuis {{$userdata->created_at}}</h6>
                    <div class="row text-center justify-content-md-center">
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                    class="mdi mdi-verified"></i>
                                <font class="font-medium">{{$nbannoncesapproved}}</font>
                            </a></div>
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                    class="mdi mdi-pause"></i>
                                <font class="font-medium">{{$nbannoncespending}}</font>
                            </a></div>
                    </div>
                </center>
            </div>
            <div>
                <hr>
            </div>
            <div class="card-body"> <small class="text-muted">Email:</small>
                <h6>{{$userdata->mail}}</h6> 
                <small class="text-muted pt-4 db">Téléphone:</small>
                <h6>{{$userdata->phone}}</h6> 
                <small class="text-muted pt-4 db">Date de naissance:</small>
                <h6>{{$userdata->birthday}}</h6>
                
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material mx-2" method='POST' action="{{route('profile.update',['profile'=>$userdata->id])}}">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label class="col-md-12">Nom Complet :</label>
                        <div class="col-md-12">
                            <input type="text" value="{{$userdata->name}}"
                                class="form-control form-control-line" name="profile_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email :</label>
                        <div class="col-md-12">
                            <input type="email" value="{{$userdata->mail}}"
                                class="form-control form-control-line" name="profile_email"
                                id="example-email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Mot de passe :</label>
                        <div class="col-md-12">
                            <input type="password" value=""
                                class="form-control form-control-line" name="profile_password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Téléphone :</label>
                        <div class="col-md-12">
                            <input type="text" value="{{$userdata->phone}}"
                                class="form-control form-control-line" name="profile_phone" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success text-white">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->
<!-- ============================================================== -->

@endsection