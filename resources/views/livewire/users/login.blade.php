<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <h1 class="text-center mb-4">Login</h1>
            <form wire:submit.prevent="login" method="post">
                @csrf
                @session('success')
                    <div class="alert alert-success">{{ $value }}</div>
                @endsession
                
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" wire:model="name" class="form-control" id="name">
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" wire:model="password" class="form-control" id="password">
                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>

            <div class="mt-3 text-center">
                <a href="/register" wire:navigate>Don't have an account? Register here</a>
            </div>
        </div>
    </div>
</div>