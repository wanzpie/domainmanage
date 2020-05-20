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
                        <th>Changed From</th>
                        <th>Changed To</th>
                        <th>Data</th>
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

                            @if($domain->oldstatus==0)
                                <td><span class="btn-secondary">Free</span> </td>
                            @elseif($domain->oldstatus==1)
                                <td><span class="btn-info">Registered</span></td>
                            @elseif($domain->oldstatus==2)
                                <td><span class="btn-warning">Delayed Admissibility</span></td>
                            @elseif($domain->oldstatus==3)
                                <td><span class="btn-warning">Quarantine</span></td>
                            @else
                                <td>None</td>
                            @endif

                            @if($domain->newstatus==0)
                                <td><span class="btn-secondary">Free</span> </td>
                            @elseif($domain->newstatus==1)
                                <td><span class="btn-info">Registered</span></td>
                            @elseif($domain->newstatus==2)
                                <td><span class="btn-warning">Delayed Admissibility</span></td>
                            @elseif($domain->newstatus==3)
                                <td><span class="btn-warning">Quarantine</span></td>
                            @else
                                <td>None</td>
                            @endif

                            <td>{{ date('d-m-Y', strtotime($domain->registered))}}</td>
                        </tr>
                    @endforeach

                    </tbody></table>


            </div>
        </div>
</section>
@endsection

