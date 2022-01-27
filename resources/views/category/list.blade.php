<table class="table table-hover mt-3">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Owner</th>
        <th>Control</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody>
    @forelse(\App\Category::with("user")->get() as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->title}}</td>
            {{--                            <td>{{\Illuminate\Support\Facades\Auth::user()->name}}</td>--}}
            <td>{{$c->user->name}}</td>
            <td>
                <a href="{{route('category.edit',$c->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                <form action="{{route('category.destroy',$c->id)}}" method="post" class="d-inline-block">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You Sure to Delete')">Delete</button>
                </form>
            </td>
            <td>
                <span>
                    <i class="feather-calendar"></i>
                    {{$c->created_at->format('d/m/Y')}}
                </span>
                <br>
                <span>
                    <i class="feather-clock"></i>
                    {{$c->created_at->format('h:i A')}}
                </span>
            </td>
        </tr>
    @empty
        <tr>
            <td class="text-center" colspan="5">There is no Category</td>
        </tr>
    @endforelse
    </tbody>
</table>
