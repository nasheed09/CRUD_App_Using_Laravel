@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3" style=" text-align: center ">Contacts</h1>
            <div style=" padding-bottom: 20px;">
               <button><a style="margin: 18px; " href="{{ route('contacts.create')}}" class="btn btn-primary">New contact</a></button>
            </div>
            <table class="table table-striped">
                <thead>

                <style>

                     {
                        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }

                    td, th {
                        border: 1px solid #ddd;
                        padding: 8px;
                    }

                    tr:nth-child(even){background-color: #f2f2f2;}

                   tr:hover {background-color: #ddd;}

                  th {
                        padding-top: 12px;
                        padding-bottom: 12px;
                        text-align: left;
                        background-color: #4CAF50;
                        color: white;
                    }

                </style>

                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Job Title</td>
                    <td>City</td>
                    <td>Country</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->id}}</td>
                        <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->job_title}}</td>
                        <td>{{$contact->city}}</td>
                        <td>{{$contact->country}}</td>
                        <td>
                            <button><a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-secondary">Edit</a></button>
                        </td>
                        <td>
                            <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" style="background-color: #e3342f" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                <div class="col-sm-12">

                    @if(session()->get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
            </div>
@endsection
