@php @$public_path = "../"; @endphp
@include('pagelink.includes.header')
<div class="card card-info" style="">
    <form action="{{route('form.create')}}" method="post">
        @csrf
        <div class="p-lg-2">
            <input type="submit" class="btn btn-success" value="Save">
            <input type="submit" class="btn btn-primary" value="New">
        </div>
        <br>
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Mobile No.</label>
                        <input type="number" min="0" name="mobile" class="form-control" placeholder="Enter ...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Remarks</label>
                        <textarea class="form-control" rows="3" name="remarks" placeholder="Enter ..."></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@include('pagelink.includes.footer')
