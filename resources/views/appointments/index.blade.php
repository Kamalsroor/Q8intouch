@extends('layouts.app')

@section('content')
<div class="row">
    <!-- /.col-md-6 -->
    <div class="col-lg-12">

      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="m-0">Featured</h5>

            <div class="form-group">
                {!! Form::label('date' , 'Date' ) !!}
                {!! Form::date('date' ,  \Carbon\Carbon::now()  , ['class' => 'form-control datatable-input']) !!}
            </div>
        </div>
        <div class="card-body">
            {{$dataTable->table()}}
        </div>
      </div>
    </div>
    <!-- /.col-md-6 -->
  </div>
@endsection


@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
    {{$dataTable->scripts()}}

<script>



    $( document ).ready(function() {
        const Url = "{{ route('appointment.index') }}" + "?date=" + $( "#date" ).val() ;
        LaravelDataTables["appointments-table"].ajax.url(Url)
        LaravelDataTables["appointments-table"].ajax.reload()
    });
    $( "#date" ).change(function() {
        const Url = "{{ route('appointment.index') }}" + "?date=" + $( "#date" ).val() ;
        LaravelDataTables["appointments-table"].ajax.url(Url)
        LaravelDataTables["appointments-table"].ajax.reload()
    });


    $(document).on("click",".destroyBtn",function(e) {
        e.preventDefault();
        const Route = $(this).attr('href');
        $.confirm({
            title: 'Are you sure!',
            content: 'You will delete this record!',
            icon: 'fa fa-question-circle-o',
            theme: 'supervan',
            closeIcon: true,
            animation: 'scale',
            type: 'orange',
            buttons: {
                confirm: function () {
                    $.ajax({
                        url: Route,
                        type: 'DELETE',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            $.growl.notice({
                                title: data.status,
                                message: data.message,
                                size: "large",
                                delayOnHover: true,
                                // duration time in ms
                                duration: 5000,
                                // close character
                                close: "&#215;",
                            });
                            $('#appointments-table').DataTable().ajax.reload();
                        },
                        error: function (data) {
                            $.growl.error({
                                title: key,
                                message: value[0]
                            });
                        }
                    });
                },
                cancel: function () {
                },
            }
        });
    });

</script>
@endpush
