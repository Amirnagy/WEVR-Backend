<x-guest-layout>



    <!-- -------------- Main Wrapper -------------- -->
    <section id="content_wrapper">

        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>

        <!-- -------------- Content -------------- -->
        <section id="content">

            <div class="allcp-form theme-primary mw320" id="login">

                <div class="panel mw320">

                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form method="POST" action="{{ route('password.store') }}">
                        <div class="panel-body pn mv10">
                            @csrf
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">


                            <div class="section">
                                <label for="email" class="field prepend-icon" :value="__('Email')">

                                    <input type="email" name="email" id="email" class="gui-input"
                                        placeholder="email" :value="old('email', $request-> email)" required autofocus
                                        autocomplete="username">


                                    <label for="email" class="field-icon"><i class="fa fa-user"></i></label>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </label>
                            </div>

                            <!--Password -->

                            <div class="section">
                                <label for="password" class="field prepend-icon" :value="__('Password')">

                                    <input type="password" name="password" id="password" class="gui-input"
                                        placeholder="Password" required autocomplete="new-password">

                                    <label for="password" class="field-icon">
                                        <i class="fa fa-lock"></i>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </label>
                                </label>
                            </div>

                            <!-- Confirm Password -->
                            <div class="section">
                                <label for="password_confirmation" :value="__('Confirm Password')"
                                    class="field prepend-icon">

                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="gui-input" placeholder=" confirm Password" name="password_confirmation"
                                        required autocomplete="new-password">

                                    <label for="password" class="field-icon">
                                        <i class="fa fa-lock"></i>
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </label>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="btn btn-bordered btn-primary pull-right">
                                    {{ __('Reset Password') }}
                                </x-primary-button>
                            </div>


                        </div>
                    </form>
                </div>
                <!-- -------------- /Panel -------------- -->
            </div>
            <!-- -------------- /Spec Form -------------- -->

        </section>
        <!-- -------------- /Content -------------- -->

    </section>
    <!-- -------------- /Main Wrapper -------------- -->

</x-guest-layout>
