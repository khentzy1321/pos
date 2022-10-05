<div method="post">
    <div class="modal fade text-left" id="ModalEdit" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">{{__('Edit Product')}}</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true"></span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('customers.update', $customer) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                     <div class="form-group">
                                        <label for="first_name"> First Name</label>
                                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                                    placeholder="First Name" value="{{ old('first_name', $customer->first_name) }}">
                                           @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                           @enderror
                                    </div>
                                     <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                                    placeholder="Last Name" value="{{ old('last_name', $customer->last_name) }}" >
                                           @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                           @enderror
                                    </div>
                                     <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                                    placeholder="Email Address" value="{{ old('email',  $customer->email) }}" >
                                           @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                           @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                    placeholder="Phone Number" value="{{ old('phone',  $customer->phone) }}">
                                           @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                           @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address"
                                                    placeholder="Address" value="{{ old('address',  $customer->address) }}">
                                           @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                           @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="avatar">Avatar</label>
                                        <div class="custom-file">
                                            <input type="file" name="avatar" class="custom-file-input" id="avatar" value="{{ old('avatar') }}">
                                            <label for="avatar" class="custom-file-label">Choose Image</label>
                                           @error('avatar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                           @enderror
                                        </div>
                                    <button class="btn btn-primary float-right" type="submit">Update Customer</button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
</div>






