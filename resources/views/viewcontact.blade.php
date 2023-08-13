@extends('layouts.admin')

@section('admin')




<div class="container-fluid shadow">
    <h1>Contacts</h1>
                    <div class="table-responsive">
                    <table id="contacts-table" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $c)
                                    <tr>
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->username}}</td>
                                        <td>{{ $c->email}}</td>
                                        
                                        <td>{{$c->subject}}</td>
                                        <td title="{{ $c->message }}">{{ Str::limit($c->message, 25) }}</td>

                                       
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>




                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                <script>
    $(document).ready(function() {
        $('#contacts-table').DataTable();
    });
</script>
@endsection