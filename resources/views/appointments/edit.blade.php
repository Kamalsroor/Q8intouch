@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">{{ trans('general.edit') }}</h5>
          </div>
          <div class="card-body">
            {!! Form::open(['route' =>  ['appointment.update',$appointment->id],'id' => 'appointmentForm' , 'method' => 'put' , 'data-reload' => "true"]) !!}
                @include('appointments.form', ['appointment' => $appointment])
                <div class="row">
                    <div class="col-12">
                      <a href="{{route('appointment.index')}}" class="btn btn-secondary " id="cancelBtn">Cancel</a>
                      {!! Form::submit('Create And Make Auther' , ['class' => 'btn btn-success float-right saveBtn ml-2' , 'data-default-val' => 'Create And Make Auther' , 'data-return' => "false"]) !!}
                      {!! Form::submit('Create And Return To All' , ['class' => 'btn btn-success float-right saveBtn ml-2', 'data-default-val' => 'Create And Return To All' , 'data-return' => "true"]) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>

          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

    </div>

@endsection


@push('scripts')
<script>


$('.saveBtn').click(function (e) {
        e.preventDefault();
        const saveBtn = $(this);
        saveBtnInAjax(saveBtn)
        AjaxHendleing(saveBtn)
    });

    $( "#date" ).change(function() {
        $.ajax({
            data: {
                'date' : $(this).val()
            },
            url: "{{ route('getAppointmentByDate') }}",
            type: "GET",
            dataType: 'html',
            success: function (data) {
                $('#allapps').html(data);
            },
            error: function (data) {
            }
        });
    });

    $.ajax({
        data: {
            'date' : $('#date').val()
        },
        url: "{{ route('getAppointmentByDate') }}",
        type: "GET",
        dataType: 'html',
        success: function (data) {
            $('#allapps').html(data);
        },
        error: function (data) {
        }
    });


    $('#user_id').on('select2:select', function (e) {
        var data = e.params.data;
        if (data.id == 0) {
            $('#name').val(null);
            $('#phone_number').val(null);
            $('#civil_id').val(null);
            return false;
        }
        $.ajax({
          data: {
              'id' : data.id
          },
          url: "{{ route('getUser') }}",
          type: "GET",
          dataType: 'json',
          success: function (data) {
              console.log(data);

              $('#name').val(data.name);
              $('#phone_number').val(data.phone_number);
              $('#civil_id').val(data.civil_id);
          },
          error: function (data) {
          }
        });
    });
    function AjaxHendleing(saveBtn) {
        const Form = $('#appointmentForm');
        $.ajax({
          data: Form.serialize(),
          url: Form.attr('action'),
          type: Form.attr('method'),
          dataType: 'json',
          success: function (data) {
            ajaxSucssesHandleing(data , Form , saveBtn , false);

            $('.select2').val(null); // Select the option with a value of '1'
            $('#user_id').val(0); // Select the option with a value of '1'
            $('.select2').trigger('change'); // Notify any JS components that the value changed

          },
          error: function (data) {
            ajaxErrorHandleing(data , saveBtn );
          }
      });
    }


</script>
@endpush
