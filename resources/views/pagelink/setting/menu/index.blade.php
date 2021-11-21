@include('pagelink.includes.header')
@include('partials.message')
<div class="card card-info" style="">
    <div class="p-lg-2">
        <a href="{{route('createMenuPage' )}}" class="btn btn-success"> Create New </a>
    </div>
    <br>
    <div class="card-header bg-cyan">
        <h3 class="card-title text-bold">Menu List</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Parent</th>
                        <th scope="col">Index</th>
                        <th scope="col">Url</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $menu)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $menu->title }}</td>
                            <td>{{ $menu['parent_id'] == '' ? $menu['title'] : $menus->where('id', $menu['parent_id'])->first()->title  }}</td>
                            <td>{{ $menu->index  }}</td>
                            <td>{{$menu->url }}</td>
                            <td>Action</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('pagelink.includes.footer')
