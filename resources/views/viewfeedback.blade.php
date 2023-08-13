@extends('layouts.admin')

@section('admin')

<style>
    .star {
    color: #f39c12; 
}
</style>


<div class="container-fluid shadow">
    <h1>Contacts</h1>
                    <div class="table-responsive">
                    <table id="contacts-table" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Id</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>feedback</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $vf)
                                    <tr>
                                        <td>{{$vf->id}}</td>
                                        <td>{{$vf->id}}</td>
                                        <td>{{$vf->username}}</td>
                                        <td>{{$vf->email}}</td>
                                        <td>
                            @for ($i = 1; $i <= $vf->feedback; $i++)
                                <i class="fa fa-star star"></i>
                            @endfor
                        </td>

                                       
                                       
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