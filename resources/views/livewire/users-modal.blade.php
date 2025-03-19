<div>
    <div id="search-box" class="flex flex-col items-center px-2 my-4 justify-center ">
        <div class="flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
            <input wire:model.live='search' type="text" placeholder="Search..."
                class="bg-gray-100 ml-2 rounded px-4 py-2 hover:bg-gray-100 shadow-2xs" />
        </div>
        {{-- <span class="text-red-500 text-xs block mt-2">Error</span> --}}

    </div>

    <!-- Keep refreshing list -->
<div wire:poll.keep-alive.20s class="container-fluid pt-4 px-4 ">
    <div class="bg-light text-center rounded p-4 flex-row">
        @if (count($users) != 0)
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Accounts</h6>

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
                        <th scope="col">Action</th>
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
                        <td><button class="btn-primary p-1 m-auto">View</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
        @else

        @endif
    </div>
</div>
<!-- Recent Sales End -->
</div>
