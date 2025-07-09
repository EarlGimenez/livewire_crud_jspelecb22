<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Register</h1>

            <form wire:submit="register" method="post">
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

                <div class="mb-3">
                    <label for="password2" class="form-label">Confirm Password</label>
                    <input type="password" wire:model="password2" class="form-control" id="password2">
                    @error('password2') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>

            <div class="mt-3 text-center">
                <a href="/login" wire:navigate>Already have an account? Login here</a>
            </div>
        </div>
    </div>
</div>