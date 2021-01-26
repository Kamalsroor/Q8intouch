    <div class="box">
    <div class="box-body">
    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
        <thead>
            <tr>
                <th class="text-left">#</th>
                <th class="text-left">Name</th>
                <th class="text-left">Phone Number</th>
                <th class="text-left">Visitor/User</th>
                <th class="text-left">Specialist</th>
                <th class="text-left">Time</th>
                <th class="text-left">Date</th>
                <th class="text-left">Status</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($Appointments as $Appointment)
                    <tr>
                        <td>{{$Appointment->id}}</td>
                        <td>{{$Appointment->user_id > 0  ? $Appointment->user->name : $Appointment->name }}</td>
                        <td>{{$Appointment->user_id > 0  ? $Appointment->user->phone_number : $Appointment->phone_number }}</td>
                        <td>{{$Appointment->user_id > 0  ? "User" : "Visitor" }}</td>
                        <td>{{$Appointment->admin->name}}</td>
                        <td>{{$Appointment->time}}</td>
                        <td>{{$Appointment->date}}</td>
                        <td>{{$Appointment->status}}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>


</div>
<!-- /.box-body -->
</div>
