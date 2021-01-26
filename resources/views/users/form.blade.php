<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="custom-content-below-registeration-tab" data-toggle="pill" href="#custom-content-below-registeration" role="tab" aria-controls="custom-content-below-registeration" aria-selected="false">Registeration</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="custom-content-below-inforamtion-tab" data-toggle="pill" href="#custom-content-below-inforamtion" role="tab" aria-controls="custom-content-below-inforamtion" aria-selected="false">User Inforamtion</a>
    </li>
</ul>

<div class="tab-content" id="custom-content-below-tabContent">
    <div class="tab-pane fade active show" id="custom-content-below-registeration" role="tabpanel" aria-labelledby="custom-content-below-registeration-tab">
        <div class="form-group">
            {!! Form::label('name' , 'Name' ) !!}
            {!! Form::text('name' , isset($user) ? $user->name : null , ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('username' , 'UserName' ) !!}
            {!! Form::text('username' , isset($user) ? $user->username : null , ['class' => 'form-control']) !!}
        </div>



        <div class="form-group">
            {!! Form::label('email' , 'Email' ) !!}
            {!! Form::email('email' , isset($user) ? $user->email : null , ['class' => 'form-control']) !!}
        </div>



        <div class="form-group">
            {!! Form::label('phone_number' , 'Phone Number' ) !!}
            {!! Form::text('phone_number' , isset($user) ? $user->phone_number : null , ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('password' , 'Password' ) !!}
            {!! Form::password('password'  , ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password_confirm' , 'Password Confirm' ) !!}
            {!! Form::password('password_confirm'  , ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('civil_id' , 'Civil ID' ) !!}
            {!! Form::text('civil_id' , isset($user) ? $user->civil_id : null , ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('stop_number' , 'Stop Number' ) !!}
            {!! Form::number('stop_number' , isset($user) ? $user->stop_number : null , ['class' => 'form-control']) !!}
        </div>



        <div class="form-group">
            {!! Form::label('nationality' , 'Nationality' ) !!}
            {!! Form::text('nationality' , isset($user) ? $user->nationality : null , ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="tab-pane fade" id="custom-content-below-inforamtion" role="tabpanel" aria-labelledby="custom-content-below-inforamtion-tab">

        <div class="form-group">
            {!! Form::label('gender' , 'Gender' ) !!}
            {!! Form::select('gender' , gender() , isset($user) ? $user->gender : null , ['class' => 'form-control custom-select']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('social_status' , 'Social Status' ) !!}
            {!! Form::select('social_status' , social_status() , isset($user) ? $user->social_status : null , ['class' => 'form-control custom-select']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('age' , 'Age' ) !!}
            {!! Form::number('age' , isset($user) ? $user->age : null , ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('diets_before' , 'Diets Before' ) !!}
            {!! Form::text('diets_before' , isset($user) ? $user->diets_before : null , ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('height' , 'Height' ) !!}
            {!! Form::number('height' , isset($user) ? $user->height : null , ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('current_weight' , 'Current Weight' ) !!}
            {!! Form::text('current_weight' , isset($user) ? $user->current_weight : null , ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('physical_activity' , 'Physical Activity' ) !!}
            {!! Form::text('physical_activity' , isset($user) ? $user->physical_activity : null , ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('medications' , 'Medications' ) !!}
            {!! Form::text('medications' , isset($user) ? $user->medications : null , ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('water_intake' , 'Water Intake' ) !!}
            {!! Form::text('water_intake' , isset($user) ? $user->water_intake : null , ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('appetite' , 'Appetite' ) !!}
            {!! Form::select('appetite' , appetite() , isset($user) ? $user->appetite : null , ['class' => 'form-control custom-select']) !!}
        </div>



        <div class="form-group">
            {!! Form::label('sleep' , 'Sleep' ) !!}
            {!! Form::text('sleep' , isset($user) ? $user->sleep : null , ['class' => 'form-control']) !!}
        </div>


    </div>

</div>









{{-- $table->string('name')->nullable(); --}}
{{-- $table->string('username'); --}}
{{-- $table->string('email')->unique(); --}}
{{-- $table->string('phone_number')->unique(); --}}
{{-- $table->string('civil_id')->nullable(); --}}
{{-- $table->string('stop_number')->nullable(); --}}
{{-- $table->string('nationality')->nullable(); --}}
{{-- $table->enum('gender', ['male', 'female']); --}}
{{-- $table->enum('social_status', ['single', 'married']); --}}
{{-- $table->integer('age')->nullable(); --}}
{{-- $table->string('diets_before')->nullable(); --}}
{{-- $table->integer('height')->nullable(); --}}
{{-- $table->string('current_weight')->nullable(); --}}
{{-- $table->string('physical_activity')->nullable();
$table->string('medications')->nullable();
$table->string('water_intake')->nullable();
$table->enum('appetite', ['good', 'very_good']);
$table->string('sleep')->nullable();
$table->timestamp('email_verified_at')->nullable();
$table->string('password'); --}}
