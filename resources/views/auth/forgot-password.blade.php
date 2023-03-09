<x-guest-layout>


    <!-- -------------- Main Wrapper -------------- -->
    <section id="content_wrapper">

        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>

        <!-- -------------- Content -------------- -->
        <section id="content">

            <div class="allcp-form theme-primary mw320" id="login">


                <span style="color:#FFFFFF"><strong>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</strong></span>


                <div class="panel mw320">

                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form method="POST" action="{{ route('password.email') }}">
                        <div class="panel-body pn mv10">
                        @csrf

                        <!-- Email Address -->

                        <div class="section">
                            <label for="email" class="field prepend-icon" :value="__('Email')">

                                <input type="email" name="email" id="email" class="gui-input"
                                    placeholder="email" :value="old('email')" required autofocus>


                                <label for="email" class="field-icon"><i class="fa fa-user"></i></label>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </label>
                        </div>



                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="btn btn-bordered btn-primary pull-right">
                                {{ __('Email Password Reset Link') }}
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

    </div>






























    </x-guest-layout>
