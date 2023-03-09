<x-guest-layout>


    <!-- -------------- Main Wrapper -------------- -->
    <section id="content_wrapper">

        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>

        <!-- -------------- Content -------------- -->
        <section id="content">

            <!-- -------------- Login Form -------------- -->
            <div class="allcp-form theme-primary mw320" id="login">

                <span style="color:#FFFFFF"><strong><u>WEVR</u></strong></span>




                <div class="panel mw320">

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" id="form-login">
                        @csrf
                        <div class="panel-body pn mv10">



                            <div class="section">
                                <label for="username" class="field prepend-icon" :value="__('Email')" >
                                    <input type="email" name="email" id="email" class="gui-input"
                                        placeholder="Email" :value="old('email')" required autofocus autocomplete="username">

                                    <label for="email" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </label>
                            </div>


                            <div class="section">
                                <label for="password" class="field prepend-icon" :value="__('Password')">

                                    <input type="password" name="password" id="password" class="gui-input"
                                        placeholder="Password"  required autocomplete="current-password" >

                                        <label for="password" class="field-icon">
                                        <i class="fa fa-lock"></i>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </label>
                                </label>
                            </div>




                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                </label>
                            </div>







                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                                <x-primary-button class="btn btn-bordered btn-primary pull-right">
                                    {{ __('Log in') }}
                                </x-primary-button>
                            </div>

                            </div>
                            <!-- -------------- /section -------------- -->

                        </div>
                        <!-- -------------- /Form -------------- -->
                    </form>
                </div>
                <!-- -------------- /Panel -------------- -->
            </div>
            <!-- -------------- /Spec Form -------------- -->

        </section>
        <!-- -------------- /Content -------------- -->

    </section>
    <!-- -------------- /Main Wrapper -------------- -->

</div>
</x-guest-layout>





