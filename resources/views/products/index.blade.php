@extends('layouts.master')

@section('content')
@section('title', 'Product')

@section('css')
  <link rel="stylesheet" href="{{'plugins/sweetalert2/sweetalert2.min.css'}}">
@endsection

<div class="card-header">
    <h2> Product List<a href="#" data-toggle="modal" data-target="#ModalCreate" class="btn btn-primary float-right">
        Add Product</a></h2>
</div>
<div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                        <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Image</th>
                              <th>Barcode</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Status</th>
                              <th>Create At</th>
                              <th>Updated At</th>
                              <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                 @foreach ($products as $product)
                       <tr>
                                 <td>{{$product->id}}</td>
                                 <td>{{$product->name}}</td>
                                 <td>{{$product->description}}</td>
                                 <td><img src="{{ Storage::url($product->image) }}" alt="pic" width="50"
                                    height="40"></td>
                                 <td>{{$product->barcode}}</td>
                                 <td>{{$product->price}}</td>
                                 <td>{{$product->quantity}}</td>
                                 <td>
                                    <span class="right badge-{{ $product->status ? 'success' : 'danger' }}">{{ $product->status ? 'Active' : 'Inactive' }}</span>
                                </td>
                                 <td>{{$product->created_at}}</td>
                                 <td>{{$product->updated_at}}</td>
                     <td>
                         <a href="{{ route('products.edit', $product) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>

                         <button class="btn btn-danger btn-sm btn-delete" data-url="{{route('products.destroy', $product->id)}}">
                                <i class="fas fa-trash" ></i></button>
                     </td>
               </tr>
               @endforeach
                </tbody>
         </table>
         <div class="d-flex justify-content-center"> {{ $products->render() }}</div>


        </div>

</div>
@endsection
@include('products.modal.create')
@section('js')
<script src="{{ 'plugins/sweetalert2/sweetalert2.min.js' }}"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script>
    $(document).ready(function {
        $(document).on('click','.btn-delete' function(){
        $this = $(this);

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Do you really want to delete this?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'delete it!',
            cancelButtonText: 'cancel!',
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                $.post($this.data('url'), {_method: 'DELETE' , _token: '{{csrf_token()}}'}, function(res){
                    $this.closest('tr').fadeOut(500, function(){
                        $this().remove();
                    })
                })
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
            }
            })
        })
    })

</script>

@endsection

