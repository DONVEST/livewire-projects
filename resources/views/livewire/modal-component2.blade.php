<div>
    <!-- Button to Open Modal -->
    <button wire:click="openModal" class="btn btn-primary">Open Modal</button>

    <!-- Modal -->
    @if($isOpen)
        <div class="modal fade show d-block" tabindex="-1" role="dialog" wire:ignore.self>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registered Users</h5>
                        <button type="button" class="close" wire:click="closeModal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container mt-5" wire:poll.5s="poll">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Agreed to Terms</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>********</td>
                                                <td>N/A</td>
                                            </tr>

                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="modal-backdrop fade show"></div> --}}
    @endif
</div>
