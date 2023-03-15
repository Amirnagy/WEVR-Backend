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

                <span style="color:#FFFFFF"><strong><u>H</u>uman <u>R</u>esource <u>M</u>anagement
                        <u>S</u>ystem</strong></span>




                <div class="panel mw320">

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="panel-body pn mv10">



                            <!--user name  -->
                            <div class="section">
                                <label for="username" class="field prepend-icon" :value="__('user name')">

                                    <input type="text" name="name" id="name" class="gui-input"
                                        placeholder="user name" :value="old('name')" required autofocus
                                        autocomplete="name">


                                    <label for="email" class="field-icon"><i class="fa fa-user"></i></label>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </label>
                            </div>

                            <!--email  -->
                            <div class="section">
                                <label for="email" class="field prepend-icon" :value="__('Email')">
                                    <input type="email" name="email" id="email" class="gui-input"
                                        placeholder="Email" :value="old('email')" required autofocus
                                        autocomplete="username">

                                    <label for="email" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </label>
                            </div>
                            <!--password  -->

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
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                    href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>

                                <x-primary-button class="btn btn-bordered btn-primary pull-right">
                                    {{ __('Register') }}
                                </x-primary-button>
                            </div>


                        </div>

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
