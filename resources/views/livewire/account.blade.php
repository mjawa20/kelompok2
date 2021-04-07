<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Kelas') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('kelas') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Ekskul Krida') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('eskul') is-invalid @enderror" value="{{ old('eskul') }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>