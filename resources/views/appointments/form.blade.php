        <div class="form-group">
            {!! Form::label('status' , 'Status' ) !!}
            {!! Form::select('status' ,  appointment_status()  , isset($appointment) ? $appointment->status : null , ['class' => 'form-control custom-select']) !!}
        </div>

       <div class="form-group">
            {!! Form::label('user_id' , 'User' ) !!}
            {!! Form::select('user_id' , [0 => 'Visitor'] + $Users , isset($appointment) ? $appointment->user_id : null , ['class' => 'form-control  select2 custom-select']) !!}
        </div>

        @if (isset($appointment) && $appointment->user_id )
            <div class="form-group">
                {!! Form::label('name' , 'Name' ) !!}
                {!! Form::text('name' , $appointment->user_id > 0  ? $appointment->user->name : $appointment->name  , ['class' => 'form-control']) !!}
            </div>
        @else
            <div class="form-group">
                {!! Form::label('name' , 'Name' ) !!}
                {!! Form::text('name' , null  , ['class' => 'form-control']) !!}
            </div>
        @endif

        @if (isset($appointment) && $appointment->user_id )
            <div class="form-group">
                {!! Form::label('phone_number' , 'Phone Number' ) !!}
                {!! Form::text('phone_number' , $appointment->user_id > 0  ? $appointment->user->phone_number : $appointment->phone_number , ['class' => 'form-control']) !!}
            </div>
        @else
            <div class="form-group">
                {!! Form::label('phone_number' , 'Phone Number' ) !!}
                {!! Form::text('phone_number' , null , ['class' => 'form-control']) !!}
            </div>

        @endif

        @if (isset($appointment) && $appointment->user_id )
            <div class="form-group">
                {!! Form::label('civil_id' , 'Civil ID' ) !!}
                {!! Form::text('civil_id' , $appointment->user_id > 0  ? $appointment->user->civil_id : $appointment->civil_id , ['class' => 'form-control']) !!}
            </div>
        @else
            <div class="form-group">
                {!! Form::label('civil_id' , 'Civil ID' ) !!}
                {!! Form::text('civil_id' , null , ['class' => 'form-control']) !!}
            </div>
        @endif

        <div class="form-group">
            {!! Form::label('admin_id' , 'Specialist' ) !!}
            {!! Form::select('admin_id' , [null => 'Specialist'] + $Admnis , isset($appointment) ? $appointment->admin_id : null , ['class' => 'form-control  select2 custom-select']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('date' , 'Date' ) !!}
            {!! Form::date('date' , isset($appointment) ? $appointment->date : null  , ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('time' , 'Time' ) !!}
            {!! Form::time('time' , isset($appointment) ? date('H:i', strtotime($appointment->time)) : null  , ['class' => 'form-control']) !!}
        </div>


        <div class="form-group row" id="allapps">
        </div>
