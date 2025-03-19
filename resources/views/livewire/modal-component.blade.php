<div>
    <!-- Button to Open Modal -->
    <button wire:click="openModal" class="btn btn-primary">Open Modal</button>

    <!-- Modal -->
    @if($isOpen)
        <div class="modal fade show d-block" tabindex="-1" role="dialog" wire:ignore.self>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create User</h5>
                        <button type="button" class="close" wire:click="closeModal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{-- <p>This is a Livewire modal.</p>
                        <div>
                            <h1>{{ $count }}</h1>

                            <button wire:click="increment">+</button>

                            <button wire:click="decrement">-</button>
                        </div> --}}

                        <form wire:submit.prevent="submitForm">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" wire:model="name" class="form-control" id="fullName" placeholder="Enter your full name" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" wire:model="email" class="form-control" id="email" placeholder="Enter your email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" wire:model="password" class="form-control" id="password" placeholder="****" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>

                    <div class="flex justify-evenly p-5">
                        <button class="btn btn-primary" wire:click="increment">+</button>
                        <h1 class="text-center">{{ $count }}</h1>
                        <button class="btn btn-primary" wire:click="decrement">-</button>
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
