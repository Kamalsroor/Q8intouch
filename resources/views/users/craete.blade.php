@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">{{ trans('general.create') }}</h5>
          </div>
          <div class="card-body">
            {!! Form::open(['route' => 'user.store','id' => 'userForm']) !!}

                @include('users.form')
                <div class="row">
                    <div class="col-12">
                      <a href="{{route('user.index')}}" class="btn btn-secondary " id="cancelBtn">Cancel</a>
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

    function AjaxHendleing(saveBtn) {
        const Form = $('#userForm');
        $.ajax({
          data: Form.serialize(),
          url: Form.attr('action'),
          type: Form.attr('method'),
          dataType: 'json',
          success: function (data) {
            ajaxSucssesHandleing(data , Form , saveBtn );
          },
          error: function (data) {
            ajaxErrorHandleing(data , saveBtn );
          }
      });
    }

</script>
@endpush
