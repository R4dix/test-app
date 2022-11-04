<x-app-layout>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-4 margin-tb mt-5">
            <div class="pull-left">
                <h2>Laravel 9 CRUD Example Tutorial</h2>
            </div>
            <div class="pull-right mb-5">
                <a class="btn btn-success" href="{{ route('companies.create') }}"> Create Company</a>
            </div>
        </div>
        <div class="col-lg-4 margin-tb mt-5">
            <a class="btn btn-warning" id="trigger-ajax" >Trigger Ajax</a>
        </div>
        <div class="col-lg-4 margin-tb mt-5">
            <p>The Ajax Result is:</p>
            <p id="ajax-result"></p>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>S.No</th>
            <th>Company Name</th>
            <th>Company Email</th>
            <th>Company Address</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->address }}</td>
                <td>
                    <form action="{{ route('companies.destroy',$company->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $companies->links() !!}
</div>
</x-app-layout>

<script>
    $("#trigger-ajax").click(function(){
        $.ajax({url: "{{ route('test-ajax') }}", success: function(result){
                $("#ajax-result").html(result);
            }});
    });
</script>
