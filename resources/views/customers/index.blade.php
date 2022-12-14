@extends('layouts.master')

@section('content')
@section('title', 'Costumer')
<div class="card-header">
    <h2> Customer List<a href="#" data-toggle="modal" data-target="#ModalCreatePro" class="btn btn-primary float-right">
        Add Customer</a></h2>
</div>
<div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                        <tr>
                              <th>ID</th>
                              <th>Avatar</th>
                              <th>First_Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>Created At</th>
                              <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                 @foreach ($customers as $customer)
                       <tr>
                                 <td>{{$customer->id}}</td>
                                 <td>
                                    <img src="{{ $customer->getAvatarUrl() }}" alt="" width="50" height="40">
                                 </td>
                                 <td>{{$customer->first_name}}</td>
                                 <td>{{$customer->last_name}}</td>

                                 <td>{{$customer->email}}</td>
                                 <td>{{$customer->phone}}</td>
                                 <td>{{$customer->address}}</td>

                                 <td>{{$customer->created_at}}</td>
                     <td>
                         <a href="{{ route('customers.edit', $customer) }}" href="#" data-toggle="modal" data-target="#ModalEdit" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                         <button class="btn btn-danger btn-sm btn-delete" data-url="{{ route( 'customers.destroy', $customer )}}">
                                <i class="fas fa-trash" ></i></button>
                     </td>
               </tr>
               @endforeach
                </tbody>
         </table>
         {{ $customers->render() }}

        </div>

</div>

@endsection

@include('customers.modal.create')
@include('customers.modal.edit')
