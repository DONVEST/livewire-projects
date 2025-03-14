<!-- Keep refreshing list -->
<div wire:poll.keep-alive.5s class="container-fluid pt-4 px-4 ">
    <div class="bg-light text-center rounded p-4 flex-row">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Salse</h6>

        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0 " id="trnBtn1">

                <thead>
                    <tr class="text-dark">
                        <th scope="col">Id</th>
                        <th>DP</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1 ?>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$count++}}</td>
                        <td><img class="rounded-circle" src="{{asset('storage/images/uploads/'.$user->image)}}" alt="" style="width: 60px; height: 50px;"></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
</div>
<!-- Recent Sales End -->