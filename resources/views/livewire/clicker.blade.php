<div> 
    <h1>{{$title}}</h1>

    <button wire:click='createNewUser'
    >Create New User</button> 
    <h5>Number of Users {{count($users)}}</h5><br>

    <form class="p-5" wire:submit='submit' action="">
        <input class="block rounded boder border-gray-100 px-3 py-1 mb-1" type="text" wire:model="name" placeholder="name">
        @error('name')
            <span class="text-danger text-xs">{{$message}}</span>
        @enderror 
        <input class="block rounded boder border-gray-100 px-3 py-1 mb-1" type="email" wire:model="email" placeholder="email">
        @error('email')
            <span class="text-danger text-xs">{{$message}}</span>
        @enderror
        <input class="block rounded boder border-gray-100 px-3 py-1 mb-1" type="password" wire:model="password" placeholder="password">
        @error('password')
            <span class="text-danger text-xs">{{$message}}</span>
        @enderror

        <button class="block rounded boder px-3 bg-gray-100 p-2 text-black">Create User</button>
    </form><br>

    <h2>List of users</h2>
    @foreach ($users as $user)
        <li>{{$user->name}} has {{$user->email}}</li>
    @endforeach
    <div class="col-12">
        {{ $users->links() }}
    </div>

    
    

</div>


