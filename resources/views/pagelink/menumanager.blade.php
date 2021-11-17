@include('pagelink.includes.header')
<div class="card card-info" style="">
    <form action="{{route('createMenuManager' )}}" name="menuManagerForm" method="post">
        @csrf
        <div class="p-lg-2">
            <input type="submit" class="btn btn-success" value="Save">
            <input type="button" class="btn btn-primary" value="New">
        </div>
        <br>
        <div class="card-header">
            <h3 class="card-title">Menu Manager</h3>

        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="index">Index</label>
                        <input type="number" min="0" class="form-control" name="index" id="index" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter ...">
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="parent_id">Parent Id</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="1">Parent1</option>
                    </select>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" name="url" id="url" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="1">button</option>
                        <option value="2">link</option>
                        <option value="3">gap</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

            </div>
        </div>
    </form>
</div>
@include('pagelink.includes.footer')
