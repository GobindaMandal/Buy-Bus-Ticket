@extends('backend.mastering.master')
    @section('gobinda')  
        <div class="col-md-4">
                <span class="alert alert-success msg" style="display:none"></span>
                <input value="{{ old('bus_name') }}" class="mt-3 form-control bus_name" type="text" placeholder="Bus Name *">
                <span class="text-danger error_bus_name"></span>
    
           
                <input value="{{ old('coach') }}" class="mt-3 form-control coach" type="text" placeholder="Coach No *">
                <span class="text-danger error_coach"></span>
            
           
                <select class="mt-3 form-control from">
                    <option value="">-----Location From-----</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Comilla">Comilla</option>
                    <option value="Dinajpur">Dinajpur</option>
                    <option value="Rangamati">Rangamati</option>
                </select>
                <span class="text-danger error_from"></span>


                <select class="mt-3 form-control to">
                    <option value="">-----Location To-----</option>
                    <option value="Rangpur">Rangpur</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Kushtia">Kushtia</option>
                    <option value="Rajshahi">Rajshahi</option>
                </select>
                <span class="text-danger error_to"></span>


                <input value="{{ old('price') }}" class="mt-3 form-control price" type="number" placeholder="Price">
                <span class="text-danger error_price"></span>


                <input value="{{ old('time') }}" class="mt-3 form-control time" type="time" placeholder="--:-- --">
                <span class="text-danger error_time"></span>


                <select class="mt-3 form-control type">
                    <option value="">-----Select Bus Type-----</option>
                    <option value="AC">AC</option>
                    <option value="Non AC">Non AC</option>
                </select>


                <input value="{{ old('counter_point') }}" class="mt-3 form-control counter_point" type="text" placeholder="Counter Point">
                <span class="text-danger error_counter_point"></span>

           
                <button class="mt-3 form-control btn-add btn btn-success">Save</button>
            </div>
            <div classs="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#sl</th>
                            <th>Bus Name</th>
                            <th>Coach No</th>
                            <th>From Location</th>
                            <th>To Location</th>
                            <th>Price</th>
                            <th>Time</th>
                            <th>Bus Type</th>
                            <th>Counter Point</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="data">
                    
                    </tbody>
                </table>
            </div>
<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this product?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button value="" type="button" class="delete btn btn-danger">Confirm</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <input class="mt-3 form-control" id="bus_name" type="text" placeholder="Bus Name *">

        <input class="mt-3 form-control" id="coach" type="text" placeholder="Coach No *">

        <select class="mt-3 form-control" id="from">
            <option value="">-----Location From-----</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Comilla">Comilla</option>
            <option value="Dinajpur">Dinajpur</option>
            <option value="Rangamati">Rangamati</option>
        </select>

        <select class="mt-3 form-control" id="to">
            <option value="">-----Location To-----</option>
            <option value="Rangpur">Rangpur</option>
            <option value="Khulna">Khulna</option>
            <option value="Kushtia">Kushtia</option>
            <option value="Rajshahi">Rajshahi</option>
        </select>
        
        <input class="mt-3 form-control" id="price" type="number" placeholder="Price">

        <input class="mt-3 form-control" id="time" type="time" placeholder="--:-- --">

        <select class="mt-3 form-control" id="type">
            <option value="">-----Select Bus Type-----</option>
            <option value="AC">AC</option>
            <option value="Non AC">Non AC</option>
        </select>

        <input class="mt-3 form-control" id="counter_point" type="text" placeholder="Counter Point">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="edit btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
            
    @endsection
        
        