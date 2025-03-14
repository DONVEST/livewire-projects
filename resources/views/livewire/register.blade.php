<div class="container-xxl position-relative bg-white d-flex p-0 shadow-2xl">
    <div class="container-fluid shadow-2xl">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <form action="" wire:submit='create' enctype="multipart/form-data" class="bg-light rounded p-4 p-sm-5 my-4 mx-3">


                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 class="text-primary ">Create New Account</h3>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" wire:model="name" value="" id="floatingText" placeholder="jhondoe">
                        <label for="floatingText">Name:</label>
                        @error('name')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" wire:model="email" value="" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email:</label>
                        @error('email')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    

                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" wire:model="password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password:</label>
                        @error('password')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    

                    <div class="mb-3">
                        @if ($image)
                        <center><img class="rounded-circle" src="{{$image->temporaryUrl()}}" alt="" style="width: 80px; height: 80px;"></center>
                        @endif
                        <label for="formFile" class="form-label">Upload Image</label>
                        <input accept="image/png, image.jpeg" class="form-control" wire:model="image" type="file" id="formFile">
                        @error('image')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>  

                    <button type="submit" class="button btn btn-primary py-3 w-100 mb-4 register-btn">
                        <div wire:loading.attr='hidden'>Create +</div> 
                        <div wire:loading class="spinner"></div>
                    </button>
                    
                                      
                </form>
                
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
</div>
