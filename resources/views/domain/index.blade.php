@extends('layouts.app')
@section('content')
<section>
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-striped table-sm table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Domain Name</th>
                        <th>PR</th>
                        <th>MR</th>
                        <th>Alexa</th>
                        <th>Backlinks</th>
                        <th>DA</th>
                        <th>PA</th>
                        <th>Registered</th>
                        <th>Valid</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($domains  as $domain )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$domain->domainame}}.{{$domain->ext}}</td>
                            <td>{{$domain->pr}}</td>
                            <td>{{$domain->mr}}</td>
                            <td>{{$domain->alexa}}</td>
                            <td>{{$domain->backlinks}}</td>
                            <td>{{$domain->da}}</td>
                            <td>{{$domain->pa}}</td>
                            <td>{{$domain->registered}}</td>
                            <td>{{$domain->valid}}</td>
                            <td><a href="{{ route('listdomain.edit', $domain->id) }}" class="btn btn-sm btn-info">Catch  </a></td>
                        </tr>
                    @endforeach

                    </tbody></table>


            </div>
        </div>
</section>
@endsection

