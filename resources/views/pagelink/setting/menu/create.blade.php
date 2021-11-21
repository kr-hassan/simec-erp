@include('pagelink.includes.header')
@include('partials.message')
<div class="card card-info" style="">
    <form action="{{ route('createMenuPage' ) }}" name="menuManagerForm" method="post">
        @csrf
        <div class="p-lg-2">
            <input type="submit" class="btn btn-success" value="Save">
            <a href="{{ route('viewMenuManager' ) }}" class="btn btn-info"> List Page </a>
        </div>
        <br>
        <div class="card-header bg-cyan">
            <h3 class="card-title text-bold">Menu Manager</h3>

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
                        <label for="title">Title
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter ..." required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="parent_id">Parent Id</label>

                    <select name="parent_id" id="parent_id" class="form-control">
                        @foreach($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->title}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" name="url" id="url" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="type">Type
                        <span class="text-danger">*</span>
                    </label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="1">button</option>
                        <option value="2">link</option>
                        <option value="3">gap</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="status">Status
                        <span class="text-danger">*</span>
                    </label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

            </div>
        </div>
    </form>
</div>
@include('pagelink.includes.footer')
